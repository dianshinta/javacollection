<?php

namespace App\Observers;

use App\Models\Bulan;
use App\Http\Controllers\EmployerSalaryController;

class BulanObserver
{
    /**
     * Handle the Bulan "created" event.
     */
    public function created(Bulan $bulan): void
    {
        EmployerSalaryController::generateSalaries();
    }

    /**
     * Handle the Bulan "updated" event.
     */
    public function updated(Bulan $bulan): void
    {
        //
    }

    /**
     * Handle the Bulan "deleted" event.
     */
    public function deleted(Bulan $bulan): void
    {
        //
    }

    /**
     * Handle the Bulan "restored" event.
     */
    public function restored(Bulan $bulan): void
    {
        //
    }

    /**
     * Handle the Bulan "force deleted" event.
     */
    public function forceDeleted(Bulan $bulan): void
    {
        //
    }
}
