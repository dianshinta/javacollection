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
            'toko_id' => 'required',
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
            'toko_id' => $request->toko_id,
            'nip' => $request->nip
        ]);
    
        session()->flash('success', 'Presensi berhasil direkam!');
        $redirectTo = $request->input('redirect_to', 'karyawan.presensi');
        return redirect()->route($redirectTo)->with('success', 'Presensi berhasil direkam!');
    }    

    public function index() {
        // Ambil riwayat presensi. Anda bisa menambahkan kondisi jika perlu (misal berdasarkan NIP).
        $riwayatPresensi = presensi::where('nip', '222212822')->orderBy('tanggal', 'desc')->orderBy('waktu', 'desc')->get();

        // Kirim data ke view 'karyawan.presensi'
        session()->flash('success', 'Presensi berhasil direkam!');
        return view( 'karyawan.presensi', compact('riwayatPresensi'));
    }

}