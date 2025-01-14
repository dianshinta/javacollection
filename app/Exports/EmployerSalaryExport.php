<?php

namespace App\Exports;

use App\Models\EmployerSalary;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EmployerSalaryExport implements FromQuery, WithHeadings, ShouldAutoSize
{
    protected $bulan_id;

    // Constructor untuk menerima bulan_id
    public function __construct($bulan_id)
    {
        $this->bulan_id = $bulan_id;
    }

    // Query untuk mengambil data
    public function query()
    {
        return EmployerSalary::query()
            ->where('bulan_id', $this->bulan_id)
            ->with(['karyawan', 'bulans'])
            ->select([
                'karyawan_nip',
                'nama',
                'jabatan',
                'total_gaji',
                'status',
            ]);
    }

    // Header kolom di file Excel
    public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'Jabatan',
            'Total Gaji',
            'Status',
        ];
    }
}
