<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    // Method untuk menampilkan informasi karyawan
    public function infokaryawan()
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil cabang yang diawasi oleh supervisor
        $supervisedBranches = $user->supervisedBranches->pluck('id')->toArray();

        // Ambil data karyawan berdasarkan cabang yang diawasi
        $karyawans = Karyawan::whereIn('toko_id', $supervisedBranches)->get();
    
        // // Ambil semua data karyawan
        // $karyawans = Karyawan::all();

        // Kirim data ke view
        return view('supervisor.infokaryawan', compact('karyawans') + [
            "title" => "Informasi Karyawan",
        ]);
    }
    
    public function berandasup()
    {
        return view('supervisor.berandasup');  // pastikan view 'supervisor.berandasup' ada
    }
}