<?php

namespace App\Observers;

use App\Models\EmployerSalary;
use App\Models\User;

class EmployerSalaryObserver
{
    /**
     * Handle the EmployerSalary "created" event.
     */
    public function created(EmployerSalary $employerSalary): void
    {
        //
    }

    /**
     * Handle the EmployerSalary "save" event.
     */
    public function saving(EmployerSalary $employerSalary)
    {
        //memperbarui nama user berdasarkan nipnya
        $user = User::where('nip', $employerSalary->user_nip)->first();
        if ($user) {
            $employerSalary->nama = $user->name;
        }
    }

    /**
     * Handle the EmployerSalary "updated" event.
     */
    public function updated(EmployerSalary $employerSalary): void
    {
        //
    }

    /**
     * Handle the EmployerSalary "deleted" event.
     */
    public function deleted(EmployerSalary $employerSalary): void
    {
        //
    }

    /**
     * Handle the EmployerSalary "restored" event.
     */
    public function restored(EmployerSalary $employerSalary): void
    {
        //
    }

    /**
     * Handle the EmployerSalary "force deleted" event.
     */
    public function forceDeleted(EmployerSalary $employerSalary): void
    {
        //
    }
}
