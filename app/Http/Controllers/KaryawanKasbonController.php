<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kasbon;

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
            'alasan' => 'required|string|max:255',
        ]);

        // Dapatkan NIP dari pengguna yang sedang login (contoh menggunakan Auth)
        // $nip = auth()->user()->nip; // Pastikan pengguna sudah login

        // if (!$nip) {
        //     return response()->json(['error' => 'Pengguna tidak ditemukan atau belum login'], 400);
        // }

        $nip = 1; 

        // Hitung total kasbon aktif untuk memastikan limit tidak terlampaui
        $limit_awal = 2000000; // Limit awal kasbon
        $total_kasbon_aktif = kasbon::where('nip', $nip)
            ->where('status', 'Belum Lunas')
            ->sum('nominal_diajukan');

        $sisa_limit = $limit_awal - $total_kasbon_aktif;

        if ($validated['nominal_diajukan'] > $sisa_limit) {
            return response()->json([
                'error' => 'Pengajuan kasbon melebihi sisa limit. Sisa limit: ' . $sisa_limit,
            ], 400);
        }

        // Buat entri kasbon baru
        kasbon::create([
            'status' => 'Belum Lunas', // Status default
            'tanggal_pengajuan' => $validated['tanggal_pengajuan'],
            'alasan' => $validated['alasan'],
            'nominal_diajukan' => $validated['nominal_diajukan'],
            'nominal_dibayar' => 0, // Belum ada pembayaran
            'nip' => $nip, // NIP dari pengguna login
        ]);

        return response()->json(['success' => 'Pengajuan Kasbon berhasil!'], 200);
    }

    public function getSisaLimit()
    {
        $limit_awal = 2000000; // Limit awal kasbon

        // Hitung total kasbon aktif
        $total_kasbon_aktif = Kasbon::where('nip', '1') // Misalkan nip nya 1
            ->where('status', 'Belum Lunas')
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
            'bukti' => 'required|string', // Membaca data base64
        ]);

        // Dapatkan kasbon yang sesuai dengan ID atau NIP tertentu
        $kasbon = kasbon::where('nip', '123456')  // Sesuaikan dengan NIP yang tepat
            ->where('status', 'Belum Lunas')
            ->first();

        if (!$kasbon) {
            return response()->json(['error' => 'Tidak ada kasbon yang belum lunas'], 400);
        }

        // Mengurangi limit dari pengguna setelah pembayaran
        $user = kasbon::where('nip', '123456')->first(); // Ambil data pengguna berdasarkan NIP
        if ($user) {
            // Mengurangi limit berdasarkan pembayaran
            $user->limit -= $validated['nominal_dibayar'];
            $user->save();
        } else {
            return response()->json(['error' => 'Pengguna tidak ditemukan'], 400);
        }

        // Menyimpan bukti pembayaran dalam database
        $kasbon->nominal_dibayarkan = $validated['nominal_pembayaran'];
        $kasbon->status = 'Lunas';  // Status menjadi Lunas setelah pembayaran
        $kasbon->bukti_pembayaran = $validated['bukti'];  // Menyimpan data base64 bukti pembayaran
        $kasbon->save();

        return response()->json(['success' => 'Pembayaran kasbon berhasil, limit diperbarui!'], 200);
    }
}
