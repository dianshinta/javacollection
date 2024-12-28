<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kasbon;
use Illuminate\Auth\Events\Validated;

class karyawanKasbonController extends Controller
{
    public function index() {
        $riwayatPengajuanKasbon = kasbon::where('nip', '1')->orderBy('tanggal_pengajuan', 'desc')->get();

        // Kirim data ke view 'karyawan.kasbon'
        return view( 'karyawan.kasbon', compact('riwayatPengajuanKasbon'));
    }

    public function save(Request $request)
    {
        // Validasi data pengajuan kasbon
        $validated = $request->validate([
            'tanggal_pengajuan' => 'required|date|after_or_equal:today',
            'nominal_diajukan' => 'required|numeric|min:1',
            'alasan' => 'required|string|max:50',
        ]);

        // Dapatkan NIP dari pengguna yang sedang login (contoh menggunakan Auth)
        // $nip = auth()->user()->nip; // Pastikan pengguna sudah login

        // if (!$nip) {
        //     return response()->json(['error' => 'Pengguna tidak ditemukan atau belum login'], 400);
        // }

        $nip = 1;

        $limit_awal = 2000000; // Limit awal kasbon
        $total_kasbon_aktif = kasbon::where('nip', $nip)
            ->where('keterangan', 'Pengajuan')
            ->sum('nominal_diajukan');

        // Hitung sisa limit
        $sisa_limit = $limit_awal - $total_kasbon_aktif - $validated['nominal_diajukan'];

        // Buat entri kasbon baru
        kasbon::create([
            'status_kasbon' => 'Belum Lunas', // Status default
            'tanggal_pengajuan' => $validated['tanggal_pengajuan'],
            'alasan' => $validated['alasan'],
            'keterangan' => 'Pengajuan',
            'nominal_diajukan' => $validated['nominal_diajukan'],
            'nominal_dibayar' => 0, // Belum ada pembayaran
            'saldo_akhir' => $sisa_limit,
            'nip' => $nip, // NIP dari pengguna login
        ]);

        return response()->json([
            'success' => 'Pengajuan Kasbon berhasil!',
            'sisa_limit' => $sisa_limit, // Tambahkan untuk respons
        ], 200);
    }

    public function getSisaLimit()
    {
        $limit_awal = 2000000; // Limit awal kasbon
        $nip = 1;

        // Hitung total kasbon aktif
        $total_kasbon_aktif = kasbon::where('nip', $nip) // Misalkan nip nya 123456
            ->where('keterangan', 'Pengajuan')
            ->sum('nominal_diajukan');

        // Hitung sisa limit
        $sisa_limit = $limit_awal - $total_kasbon_aktif;

        return response()->json([
            'limit_awal' => $limit_awal,
            'kasbon_aktif' => $total_kasbon_aktif,
            'sisa_limit' => $sisa_limit,
        ], 200);
    }

    public function payment(Request $request)
    {
        // Validasi data pembayaran
        $validated = $request->validate([
            'tanggal_pembayaran' => 'required|date',
            'nominal_pembayaran' => 'required|numeric|min:0',
            'lampiran' => 'required|file|mimes:jpg,jpeg,png,pdf', // Validasi file (gambar atau pdf)
        ]);

        // Menangani file lampiran
        $lampiran = $request->file('lampiran')->store('uploads/lampiran', 'public');

        // Mendapatkan NIP pengguna yang melakukan pembayaran
        $nip = 1; // Ganti dengan NIP yang sesuai jika diperlukan

        // Mencari kasbon yang belum lunas dan sesuai dengan NIP
        $kasbon = kasbon::where('nip', $nip)
                        ->where('keterangan', 'Pengajuan')
                        ->orderBy('tanggal_pengajuan', 'desc')
                        ->first();

        // Jika tidak ditemukan kasbon yang belum lunas
        if (!$kasbon) {
            return response()->json(['error' => 'Tidak ada kasbon yang belum lunas'], 400);
        }

        // Mengurangi limit dan menambah saldo pengguna berdasarkan pembayaran
        $user = kasbon::where('nip', $nip)->first(); // Ambil data pengguna berdasarkan NIP
        if ($user) {
            $user->limit -= $validated['nominal_pembayaran'];  // Mengurangi limit
            $user->saldo_akhir += $validated['nominal_pembayaran'];  // Menambah saldo akhir
            $user->save();  // Simpan perubahan
        } else {
            return response()->json(['error' => 'Pengguna tidak ditemukan'], 400);
        }

        // Menyimpan pembayaran dan bukti lampiran ke database
        $kasbon->tanggal_pembayaran = $validated['tanggal_pembayaran'];
        $kasbon->nominal_dibayar = $validated['nominal_pembayaran'];
        $kasbon->status_kasbon = 'Lunas';  // Status kasbon diubah menjadi Lunas
        $kasbon->status_bayar = 'Diproses'; // Status pembayaran diubah menjadi Diproses
        $kasbon->keterangan = 'Pembayaran'; // Keterangan pembayaran
        $kasbon->lampiran = $lampiran;  // Menyimpan path file lampiran
        $kasbon->save();  // Simpan perubahan kasbon

        // Mengirimkan response dengan data terbaru
        return response()->json([
            'success' => 'Pembayaran kasbon berhasil, limit dan saldo akhir diperbarui!',
            'sisa_limit' => $user->limit,  // Kirimkan sisa limit yang telah diperbarui
            'saldo_akhir' => $user->saldo_akhir,  // Kirimkan saldo akhir yang telah diperbarui
        ], 200);
    }
}