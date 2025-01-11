<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\presensi;
use Carbon\Carbon;

class PresensiController extends Controller
{
    //
    public function store(Request $request) {
        $nip = Auth::user()->nip;

        $request->validate([
            'status' => 'required',
            'toko_id' => 'required',
            // 'nip' => 'required|string'
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
            'nip' => $nip
        ]);
    
        session()->flash('success', 'Presensi berhasil direkam!');
        $redirectTo = $request->input('redirect_to', 'karyawan.presensi');
        return redirect()->route($redirectTo)->with('success', 'Presensi berhasil direkam!');
    }    

    public function index() {
        $nip = Auth::user()->nip;
        $today = date('Y-m-d');

        $hasPresensiToday = presensi::where('nip', $nip)
                                    ->whereDate('tanggal', $today)
                                    ->exists();

        // Ambil riwayat presensi. Anda bisa menambahkan kondisi jika perlu (misal berdasarkan NIP).
        $riwayatPresensi = presensi::where('nip', $nip)->orderBy('tanggal', 'desc')->orderBy('waktu', 'desc')->get();

        // Mengambil data user yang sedang login dan relasi karyawan dan toko
        $user = auth()->user(); // Mengambil user yang sedang login
        $user = $user->load('karyawan.toko'); // Mengambil relasi karyawan dan toko
        
        $hasPermissionToday = DB::table('perizinan')
                            ->where('nip', $nip)
                            ->whereDate('tanggal', $today)
                            ->exists(); // Mengecek apakah ada data perizinan untuk tanggal hari ini

        // Kirim data ke view 'karyawan.presensi'
        session()->flash('success', 'Presensi berhasil direkam!');
        return view( 'karyawan.presensi', compact('riwayatPresensi', 'hasPresensiToday', 'user', 'hasPermissionToday'));
    }    
}