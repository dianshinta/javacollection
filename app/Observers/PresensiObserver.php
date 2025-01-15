<?php

namespace App\Observers;

use App\Models\Presensi;
use App\Models\EmployerSalary;

class PresensiObserver
{
     /**
     * Handle the Presensi "saved" or "updated" event.
     */
    public function saved(Presensi $presensi): void
    {
        $nip = $presensi->nip;
        $bulanId = $presensi->bulan_id;

        // Hitung ulang kehadiran untuk karyawan dan bulan tertentu
        $hadir = Presensi::where('nip', $nip)
            ->where('bulan_id', $bulanId)
            ->whereIn('status', ['Hadir', 'Terlambat'])
            ->count();

        // Perbarui kolom hadir pada employer_salaries
        EmployerSalary::where('karyawan_nip', $nip)
            ->where('bulan_id', $bulanId)
            ->update(['hadir' => $hadir]);
    }

    /**
     * Handle the Presensi "created" event.
     */
    public function created(Presensi $presensi): void
    {
        //
    }

    /**
     * Handle the Presensi "updated" event.
     */
    public function updated(Presensi $presensi): void
    {
        //
    }

    /**
     * Handle the Presensi "deleted" event.
     */
    public function deleted(Presensi $presensi): void
    {
        //
    }

    /**
     * Handle the Presensi "restored" event.
     */
    public function restored(Presensi $presensi): void
    {
        //
    }

    /**
     * Handle the Presensi "force deleted" event.
     */
    public function forceDeleted(Presensi $presensi): void
    {
        //
    }
}
