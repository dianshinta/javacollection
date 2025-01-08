<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    // Method untuk menampilkan informasi karyawan
    public function infokaryawan()
    {
        // Ambil semua data karyawan
        $karyawans = Karyawan::all();

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