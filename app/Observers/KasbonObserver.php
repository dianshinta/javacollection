<?php

namespace App\Observers;

use App\Models\Kasbon;
use App\Models\EmployerSalary;
use App\Http\Controllers\EmployerSalaryController;

class KasbonObserver
{

    /**
     * Handle the Kasbon "updated" event.
     */
    public function updated(Kasbon $kasbon): void
    {
        EmployerSalaryController::updateKasbon($kasbon->nip, $kasbon->bulan_id);
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
