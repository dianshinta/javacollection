<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployerSalary;
use App\Models\Karyawan;
use App\Models\Presensi;
use App\Models\Kasbon;
use App\Models\Bulan;

class EmployerSalaryController extends Controller
{
    /**
     * Menampilkan daftar gaji.
     */
    public function index()
    {
        $this->updateNamaInEmployerSalaries();

        return view('/manajer/gajiKaryawan', ["title" => "Gaji", 'datas' => EmployerSalary::all()]);
    }

    /**
     * Generate automatic EmployerSalary records.
     */
    public static function generateSalaries()
    {
        // Ambil semua nip dari tabel users
        $karyawans = Karyawan::select('nip')->get();

        // Ambil semua id dari tabel bulans
        $bulans = Bulan::select('id')->get();

        $newEntries = [];
        $currentTimestamp = now();

        foreach ($karyawans as $karyawan) {
            foreach ($bulans as $bulan) {
                // Cek apakah data sudah ada
                $exists = EmployerSalary::where('karyawan_nip', $karyawan->nip)
                    ->where('bulan_id', $bulan->id)
                    ->exists();

                if (!$exists) {
                    $newEntries[] = [
                        'karyawan_nip' => $karyawan->nip,
                        'bulan_id' => $bulan->id,
                        'created_at' => $currentTimestamp,
                        'updated_at' => $currentTimestamp,
                    ];
                }
            }
        }

        // Masukkan data baru ke tabel employer_salaries
        if (!empty($newEntries)) {
            EmployerSalary::insert($newEntries);
        }
    }

    //update nama dalam tabel employer salaries
    public function updateNamaInEmployerSalaries()
    {
        // Ambil semua data employer_salaries
        $employerSalaries = EmployerSalary::all();

        foreach ($employerSalaries as $employerSalary) {
            // Cari user berdasarkan user_nip
            $karyawan = Karyawan::where('nip', $employerSalary->karyawan_nip)->first();

            if ($karyawan) {
                // Perbarui kolom nama
                $employerSalary->nama = $karyawan->nama;
                $employerSalary->save();
            }
        }

        return response()->json(['message' => 'Kolom nama berhasil diperbarui untuk semua data']);
    }
}
