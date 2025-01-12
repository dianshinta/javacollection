<?php

namespace App\Http\Controllers;

use App\Models\EmployerSalary;
use App\Models\kasbon;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class karyawanKasbonController extends Controller
{
    public function index() {
        $nip = Auth::user()->nip;
        // $nip = 1;
        $riwayatKasbon = kasbon::where('nip', $nip)->orderBy('created_at', 'desc')->get();

        // Kirim data ke view 'karyawan.kasbon'
        return view('karyawan.kasbon', compact('riwayatKasbon'))->with('title', 'Kasbon');
    }

    public function save(Request $request)
    {
        // Validasi data pengajuan kasbon
        $validated = $request->validate([
            'tanggal_pengajuan' => 'required|date|after_or_equal:today',
            'nominal_diajukan' => 'required|numeric|min:1',
            'alasan' => 'required|string|max:50',
        ]);

        // NIP pengguna, bisa disesuaikan dengan pengguna yang sedang login
        $nip = Auth::user()->nip;

        // Ambil kasbon aktif terakhir
        $kasbonAktif = kasbon::where('nip', $nip)
            ->orderBy('created_at', 'desc')
            ->first();

        // Limit kasbon berdasarkan gaji pokok karyawan
        $karyawan = Karyawan::where('nip', $nip)->first();
        if (!$karyawan) {
            return response()->json([
                'message' => 'Karyawan tidak ditemukan.',
            ], 404);
        }

        $limit_awal = $karyawan->gaji_pokok;

        // Jika belum ada kasbon sebelumnya, maka gunakan limit awal
        $sisa_limit = $limit_awal;

        // Jika kasbon aktif ditemukan, hitung sisa limit berdasarkan kasbon sebelumnya
        if ($kasbonAktif) {
            $sisa_limit = $kasbonAktif->saldo_akhir; // Ambil saldo akhir kasbon sebelumnya
        }

        // Pastikan nominal yang diajukan tidak melebihi sisa limit
        if ($validated['nominal_diajukan'] > $sisa_limit) {
            return response()->json(['error' => 'Nominal yang diajukan melebihi sisa limit.'], 400);
        }

        // Hitung sisa limit setelah pengajuan
        $sisa_limit -= $validated['nominal_diajukan'];

        // Buat entri kasbon baru
        kasbon::create([
            'status_kasbon' => 'Belum Lunas', // Status default
            'tanggal_pengajuan' => $validated['tanggal_pengajuan'],
            'alasan' => $validated['alasan'],
            'keterangan' => 'Pengajuan',
            'nominal_diajukan' => $validated['nominal_diajukan'],
            'nominal_dibayar' => 0, // Belum ada pembayaran
            'saldo_akhir' => $sisa_limit, // Saldo akhir setelah pengajuan
            'nama' => Auth::user()->name,
            'nip' => $nip, // NIP dari pengguna
        ]);

        return response()->json([
            'success' => 'Pengajuan Kasbon berhasil!',
            'sisa_limit' => $sisa_limit, // Tambahkan untuk respons
        ], 200);
    }

    public function getSisaLimit()
    {
        $nip = Auth::user()->nip;

        // Ambil data karyawan berdasarkan NIP
        $karyawan = Karyawan::where('nip', $nip)->first();
        if (!$karyawan) {
            return response()->json([
                'message' => 'Karyawan tidak ditemukan.',
            ], 404);
        }

        // Default saldo akhir
        $saldo_akhir = 0;

        // Cek apakah gaji sudah terkirim
        $gajiTerkirim = EmployerSalary::where('karyawan_nip', $karyawan->nip)
            ->where('status', 'terkirim') // Asumsi status "terkirim" menunjukkan gaji sudah dikirim
            ->exists();

        if ($gajiTerkirim) {
            // Jika gaji terkirim, saldo akhir = gaji pokok
            $saldo_akhir = $karyawan->gaji_pokok;
        } else {
            // Jika gaji belum terkirim, hitung saldo akhir berdasarkan transaksi kasbon
            $total_pengajuan = kasbon::where('nip', $nip)
                ->where('keterangan', 'Pengajuan')
                ->sum('nominal_diajukan');

            $total_pembayaran = kasbon::where('nip', $nip)
                ->where('keterangan', 'Pembayaran')
                ->where('status_bayar', 'Disetujui')
                ->sum('nominal_dibayar');

            $saldo_akhir = $karyawan->gaji_pokok - $total_pengajuan + $total_pembayaran;
        }

        // Update saldo akhir di kasbon aktif jika ada
        $kasbonAktif = kasbon::where('nip', $nip)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($kasbonAktif) {
            $kasbonAktif->saldo_akhir = $saldo_akhir;
            $kasbonAktif->update();
        }

        return response()->json([
            'limit_awal' => $karyawan->gaji_pokok,
            'sisa_limit' => $saldo_akhir,
        ], 200);
    }

    public function pay(Request $request)
    {
        // Validasi data pembayaran kasbon
        $validated = $request->validate([
            'tanggal_pembayaran' => 'required|date|after_or_equal:today',
            'nominal_pembayaran' => 'required|numeric|min:1',
            'lampiran' => 'required',
            'lampiran_nama' => 'required|string',
        ]);

        // Dekode file base64
        $decodedFile = base64_decode($validated['lampiran']);
        if (!$decodedFile) {
            return response()->json(['error' => 'Lampiran tidak valid.'], 400);
        }

        // Buat nama file acak
        $fileName = time() . '_' . $validated['lampiran_nama'];
        // Simpan file di storage publik
        $filePath = 'uploads/lampiran/' . $fileName;
        Storage::disk('public')->put($filePath, $decodedFile);

        $nip = Auth::user()->nip;

        // Ambil data karyawan berdasarkan NIP
        $karyawan = Karyawan::where('nip', $nip)->first();
        if (!$karyawan) {
            return response()->json(['error' => 'Karyawan tidak ditemukan.'], 404);
        }

        // Ambil status apakah gaji sudah terkirim
        $gajiTerkirim = EmployerSalary::where('karyawan_nip', $karyawan->nip)
            ->where('status', 'Telah Dikirim')
            ->exists();

        // Hitung total pengajuan dan pembayaran
        $total_pengajuan = kasbon::where('nip', $nip)
            ->where('keterangan', 'Pengajuan')
            ->sum('nominal_diajukan');

        $total_pembayaran = kasbon::where('nip', $nip)
            ->where('keterangan', 'Pembayaran')
            ->sum('nominal_dibayar');

        // Default saldo akhir
        $saldo_akhir = $karyawan->gaji_pokok;

        // Jika gaji sudah terkirim, reset saldo akhir ke gaji pokok
        if ($gajiTerkirim) {
            $saldo_akhir = $karyawan->gaji_pokok;
        } else {
            $saldo_akhir = $karyawan->gaji_pokok - $total_pengajuan + $total_pembayaran;
        }

        // Proses pembayaran
        $pembayaran = kasbon::create([
            'status_kasbon' => 'Belum Lunas', // Default
            'status_bayar' => 'Diproses',
            'tanggal_pembayaran' => $validated['tanggal_pembayaran'],
            'alasan' => '-', // Default alasan
            'keterangan' => 'Pembayaran',
            'nominal_dibayar' => $validated['nominal_pembayaran'],
            'saldo_akhir' => $saldo_akhir,
            'lampiran' => Storage::url($filePath),
            'nama' => Auth::user()->name,
            'nip' => $nip,
        ]);

        $pembayaran->keterangan = 'Pembayaran';
        $pembayaran->update();

        return response()->json([
            'success' => 'Pembayaran Kasbon berhasil!',
            'saldo_akhir_baru' => $saldo_akhir,
        ], 200);
    }
}