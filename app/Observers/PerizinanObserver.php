<?php

namespace App\Observers;

use App\Models\Perizinan;
use App\Models\EmployerSalary;
use App\Http\Controllers\EmployerSalaryController;

class PerizinanObserver
{
    /**
     * Handle the Perizinan "updated" event.
     */
    public function updated(Perizinan $perizinan): void
    {
        if ($perizinan->status === 'Disetujui') {
            EmployerSalaryController::updateIzin($perizinan->nip, $perizinan->bulan_id);
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
