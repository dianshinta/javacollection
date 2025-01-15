<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Bulan;
use App\Observers\UserObserver;
use App\Observers\BulanObserver;
use App\Models\EmployerSalary;
use App\Models\Karyawan;
use App\Models\Presensi;
use App\Models\Perizinan;
use App\Models\Kasbon;
use App\Observers\EmployerSalaryObserver;
use App\Observers\KaryawanObserver;
use App\Observers\PresensiObserver;
use App\Observers\PerizinanObserver;
use App\Observers\KasbonObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set bahasa Indonesia untuk tanggal
        Carbon::setLocale('id');
        setlocale(LC_TIME, 'id_ID');
        User::observe(UserObserver::class);
        Karyawan::observe(KaryawanObserver::class);
        Bulan::observe(BulanObserver::class);
        EmployerSalary::observe(EmployerSalaryObserver::class);
        presensi::observe(PresensiObserver::class);
        perizinan::observe(PerizinanObserver::class);
        kasbon::observe(KasbonObserver::class);
    }
}
