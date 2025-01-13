<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployerSalary;
use Illuminate\Support\Facades\Auth;
use PDF;

class SlipGajiController extends Controller
{
    public function index()
    {
        $nip = Auth::user()->nip;
        $salaries = EmployerSalary::where('karyawan_nip', $nip)->get();

        return view('karyawan.gaji', ['salaries' => $salaries]);
    }

    public function generatePDF($id)
    {
        $salary = EmployerSalary::findOrFail($id);

        // Load the view with salary data and generate the PDF
        $pdf = PDF::loadView('pdf\pdfgaji', compact('salary'));

        // Stream the PDF back to the browser for download
        return $pdf->download('slip_gaji_' . $salary->id . '.pdf');
    }
}
