<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployerSalary;
use App\Models\User;
use App\Models\Presensi;
use App\Models\Kasbon;

class EmployerSalaryController extends Controller
{
    /**
     * Menampilkan daftar gaji.
     */
    public function index()
    {
        return view('/manajer/gaji karyawan', ["title" => "Gaji", 'datas' => EmployerSalary::all()]);
    }

}
