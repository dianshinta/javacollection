<?php

namespace App\Exports;

use App\Models\EmployerSalary;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployerSalaryExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $bulan_id;

    // Constructor untuk menerima parameter bulan_id
    public function __construct(int $bulan_id)
    {
        $this->bulan_id = $bulan_id;
    }

    // Data yang akan diexport
    public function collection()
    {
        return EmployerSalary::with(['karyawan', 'bulans'])
            ->where('bulan_id', $this->bulan_id)
            ->get()
            ->map(function ($salary) {
                return [
                    'NIP' => $salary->karyawan->nip,
                    'Nama Karyawan' => $salary->karyawan->nama,
                    'Bulan' => $salary->bulans->bulan_tahun,
                    'Gaji Pokok' => $salary->gaji_pokok,
                    'Kehadiran' => $salary->hadir ?? 10,
                    'Absen' => $salary->absen,
                    'Izin' => $salary->izin,
                    'Kasbon' => $salary->kasbon,
                    'Denda' => $salary->denda,
                    'Total Gaji' => $salary->total_gaji,
                ];
            });
    }

    // Header untuk Excel
    public function headings(): array
    {
        return [
            'NIP',
            'Nama Karyawan',
            'Bulan',
            'Gaji Pokok',
            'Kehadiran',
            'Absen',
            'Izin',
            'Kasbon',
            'Denda',
            'Total Gaji',
        ];
    }
}
