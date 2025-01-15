<?php

namespace App\Observers;

use App\Models\Perizinan;
use App\Models\EmployerSalary;

class PerizinanObserver
{
    /**
     * Handle the Perizinan "updated" event.
     */
    public function updated(Perizinan $perizinan): void
    {
        if ($perizinan->status === 'Disetujui') {
            $nip = $perizinan->nip;
            $bulanId = $perizinan->bulan_id;

            // Hitung ulang jumlah izin untuk karyawan dan bulan tertentu
            $izin = Perizinan::where('nip', $nip)
                ->where('bulan_id', $bulanId)
                ->where('status', 'Disetujui')
                ->count();

            // Perbarui kolom izin pada employer_salaries
            EmployerSalary::where('karyawan_nip', $nip)
                ->where('bulan_id', $bulanId)
                ->update(['izin' => $izin]);
        }
    }

    /**
     * Handle the Perizinan "created" event.
     */
    public function created(Perizinan $perizinan): void
    {
        //
    }

    /**
     * Handle the Perizinan "deleted" event.
     */
    public function deleted(Perizinan $perizinan): void
    {
        //
    }

    /**
     * Handle the Perizinan "restored" event.
     */
    public function restored(Perizinan $perizinan): void
    {
        //
    }

    /**
     * Handle the Perizinan "force deleted" event.
     */
    public function forceDeleted(Perizinan $perizinan): void
    {
        //
    }
}
