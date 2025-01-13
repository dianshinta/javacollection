<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployerSalary;
use Illuminate\Support\Facades\Auth;

class SlipGajiController extends Controller
{
    public function index()
    {
        $nip = Auth::user()->nip;
        $salaries = EmployerSalary::where('karyawan_nip', $nip)->get();

        return view('karyawan.gaji', ['salaries' => $salaries]);
    }
}
