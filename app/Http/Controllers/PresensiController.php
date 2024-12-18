<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\presensi;

class PresensiController extends Controller
{
    //
    public function store(Request $request) {
        $request->validate([
            'status' => 'required',
            'toko' => 'required|string',
            'nip' => 'required|string'
        ]);
    
        // Ambil current waktu dan tanggal
        $waktu = now()->format('H:i:s');
        $tanggal = now()->format('Y-m-d');
        
        // Simpan data presensi
        presensi::create([
            'status' => $request->status,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'toko' => $request->toko,
            'nip' => $request->nip
        ]);
    
        // Ambil riwayat presensi berdasarkan NIP
        // $riwayatPresensi = presensi::where('nip', $request->nip)->orderBy('tanggal', 'desc')->get();
        session()->flash('success', 'Presensi berhasil direkam!');
        $redirectTo = $request->input('redirect_to', 'karyawan.presensi');
        return redirect()->route($redirectTo)->with('success', 'Presensi berhasil direkam!');
    }    

    public function index() {
        // Ambil riwayat presensi. Anda bisa menambahkan kondisi jika perlu (misal berdasarkan NIP).
        $riwayatPresensi = presensi::where('nip', '123456')->orderBy('tanggal', 'desc')->get();

        // Kirim data ke view 'karyawan.presensi'
        session()->flash('success', 'Presensi berhasil direkam!');
        return view( 'karyawan.presensi', compact('riwayatPresensi'));
    }

}