<?php

namespace App\Observers;

use App\Models\Kasbon;
use App\Models\EmployerSalary;

class KasbonObserver
{

    /**
     * Handle the Kasbon "updated" event.
     */
    public function updated(Kasbon $kasbon): void
    {
        $nip = $kasbon->nip;
        $bulanId = $kasbon->bulan_id;

        // Ambil nilai saldo_akhir
        $saldoAkhir = $kasbon->saldo_akhir;

        // Perbarui kolom kasbon pada employer_salaries
        EmployerSalary::where('karyawan_nip', $nip)
            ->where('bulan_id', $bulanId)
            ->update(['kasbon' => $saldoAkhir]);
    }

    /**
     * Handle the Kasbon "created" event.
     */
    public function created(Kasbon $kasbon): void
    {
        //
    }

    /**
     * Handle the Kasbon "deleted" event.
     */
    public function deleted(Kasbon $kasbon): void
    {
        //
    }

    /**
     * Handle the Kasbon "restored" event.
     */
    public function restored(Kasbon $kasbon): void
    {
        //
    }

    /**
     * Handle the Kasbon "force deleted" event.
     */
    public function forceDeleted(Kasbon $kasbon): void
    {
        //
    }
}
