<?php

namespace App\Observers;

use App\Models\Presensi;
use App\Models\EmployerSalary;
use App\Http\Controllers\EmployerSalaryController;

class PresensiObserver
{
     /**
     * Handle the Presensi "saved" or "updated" event.
     */
    public function saved(Presensi $presensi): void
    {
        EmployerSalaryController::updateHadir($presensi->nip, $presensi->bulan_id);
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
