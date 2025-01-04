<?php

namespace App\Http\Controllers;

use App\Models\kasbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class karyawanKasbonController extends Controller
{
    public function index() {
        // $nip = Auth::user()->nip;
        $riwayatKasbon = kasbon::where('nip', '1')->orderBy('created_at', 'desc')->get();

        // Kirim data ke view 'karyawan.kasbon'
        return view('karyawan.kasbon', compact('riwayatKasbon'));
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
        $nip = 1;

        // Ambil kasbon aktif terakhir
        $kasbonAktif = kasbon::where('nip', $nip)
            ->orderBy('created_at', 'desc')
            ->first();

        // Tentukan limit awal kasbon (misal: 2.000.000)
        $limit_awal = 2000000;

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
            'nama' => 'Budi',
            'nip' => $nip, // NIP dari pengguna
        ]);

        return response()->json([
            'success' => 'Pengajuan Kasbon berhasil!',
            'sisa_limit' => $sisa_limit, // Tambahkan untuk respons
        ], 200);
    }

    public function getSisaLimit()
    {
        // $nip = Auth::user()->nip;
        $nip = 1;

        // Limit kasbon berdasarkan gaji pokok karyawan
        // $karyawan = Karyawan::where('nip', $nip)->first();
        // if (!$karyawan) {
        //     return response()->json([
        //         'message' => 'Karyawan tidak ditemukan.',
        //     ], 404);
        // }

        // $limit_awal = $karyawan->gaji_pokok;

        $limit_awal = 2000000;

        // Hitung total pengajuan dan total pembayaran
        $total_pengajuan = kasbon::where('nip', $nip)
            ->where('keterangan', 'Pengajuan')
            ->sum('nominal_diajukan');

        $total_pembayaran = kasbon::where('nip', $nip)
            ->where('keterangan', 'Pembayaran')
            ->where('status_bayar', 'Disetujui')
            ->sum('nominal_dibayar');

        // Hitung sisa limit
        $saldo_akhir = $limit_awal - $total_pengajuan + $total_pembayaran;

        // Update limit di database
        $kasbonAktif = kasbon::where('nip', $nip)
            ->orderBy('created_at', 'desc')
            ->first();

        $kasbonAktif->saldo_akhir = $saldo_akhir;
        $kasbonAktif->update();

        return response()->json([
            'limit_awal' => $limit_awal,
            'sisa_limit' => $saldo_akhir,
        ], 200);
    }

    public function pay(Request $request)
    {
        // Validasi data pembayaran kasbon
        $validated = $request->validate([
            'tanggal_pembayaran' => 'required|date|after_or_equal:today',
            'nominal_pembayaran' => 'required|numeric|min:1',
            'lampiran' => 'required|string',
            'lampiran_nama' => 'required|string',
        ]);

        // Dekode file base64
        $decodedFile = base64_decode($validated['lampiran']);
        if (!$decodedFile) {
            return response()->json(['error' => 'Lampiran tidak valid.'], 400);
        }

        // Buat nama file acak
        $randomFileName = Str::random(16) . '.' . pathinfo($validated['lampiran_nama'], PATHINFO_EXTENSION);

        // Simpan file di storage publik
        $filePath = 'uploads/lampiran/' . $randomFileName;
        Storage::disk('public')->put($filePath, $decodedFile);

        $nip = 1;

        // Ambil data kasbon terkait nip
        $kasbonAktif = kasbon::where('nip', $nip)
            ->where('status_kasbon', 'Belum Lunas')
            ->orderBy('created_at', 'desc')
            ->first();

        // Pastikan kasbon aktif ditemukan
        if (!$kasbonAktif) {
            return response()->json(['error' => 'Tidak ada kasbon aktif yang ditemukan.'], 400);
        }

        // Periksa apakah nominal pembayaran valid
        $limit_awal = 2000000;
        $total_pengajuan = kasbon::where('nip', $nip)
            ->where('keterangan', 'Pengajuan')
            ->sum('nominal_diajukan');

        $total_pembayaran = kasbon::where('nip', $nip)
            ->where('keterangan', 'Pembayaran')
            ->sum('nominal_dibayar');

        // Hitung saldo akhir baru
        $saldo_akhir_sekarang = $limit_awal - $total_pengajuan + $total_pembayaran;

        if ($validated['nominal_pembayaran'] > $saldo_akhir_sekarang) {
            return response()->json(['error' => 'Nominal pembayaran melebihi sisa kasbon.'], 400);
        }

        $saldo_akhir_baru = $saldo_akhir_sekarang + $validated['nominal_pembayaran'];

        $pembayaran = kasbon::create([
            'status_kasbon' => 'Belum Lunas', // Default
            'status_bayar' => 'Diproses',
            'tanggal_pembayaran' => $validated['tanggal_pembayaran'],
            'alasan' => '-',
            'keterangan' => 'Pembayaran',
            'nominal_dibayar' => $validated['nominal_pembayaran'],
            'saldo_akhir' => $saldo_akhir_sekarang,
            'lampiran' => Storage::url($filePath),
            'nama' => 'Budi',
            'nip' => $nip,
        ]);

        $pembayaran->keterangan = 'Pembayaran';
        $pembayaran->update();

        return response()->json([
            'success' => 'Pembayaran Kasbon berhasil!',
            'saldo_akhir_baru' => $saldo_akhir_sekarang,
        ], 200);
    }
}