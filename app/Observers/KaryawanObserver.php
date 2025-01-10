<?php

namespace App\Observers;

use App\Models\Karyawan;
use App\Http\Controllers\EmployerSalaryController;

class KaryawanObserver
{
    /**
     * Handle the Karyawan "created" event.
     */
    public function created(Karyawan $karyawan): void
    {
        EmployerSalaryController::generateSalaries();
    }

    /**
     * Handle the Karyawan "updated" event.
     */
    public function updated(Karyawan $karyawan): void
    {
        //
    }

    /**
     * Handle the Karyawan "deleted" event.
     */
    public function deleted(Karyawan $karyawan): void
    {
        //
    }

    /**
     * Handle the Karyawan "restored" event.
     */
    public function restored(Karyawan $karyawan): void
    {
        //
    }

    /**
     * Handle the Karyawan "force deleted" event.
     */
    public function forceDeleted(Karyawan $karyawan): void
    {
        //
    }
}
