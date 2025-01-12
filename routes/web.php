<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\supervisorPerizinanController;
use App\Http\Controllers\supervisorPembayaranController;
use App\Http\Controllers\SupervisorPengajuanController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\KaryawanKasbonController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployerSalaryController;
use App\Http\Controllers\EditKaryawanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest')->name('password.email');

Route::get('/', function () {
    return view('auth.login');
});

// Menampilkan halaman login
Route::get('/login', function () {
    return view('auth.login'); // Pastikan ada file `auth/login.blade.php`
})->name('login');

Route::get('/resetpassword', function () {
    return view('auth.resetpassword'); // Pastikan ada file `auth/resetpassword.blade.php`
})->name('resetpassword');

// Menampilkan halaman registrasi
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/logout', function () {
    Auth::logout(); // Mengakhiri sesi pengguna
    return redirect('/login'); // Mengarahkan ke halaman login
})->name('logout');

Route::middleware(['web'])->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['web'])->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    });
});

// BAGIAN HALAMAN KARYAWAN
Route::middleware(['auth', 'role:karyawan'])->group(function () {
    Route::get('/karyawan/beranda/', function () {
        return view('/karyawan/beranda', [
            "title" => "Beranda"
        ]);
    })->name('karyawan.beranda');

    Route::post('/perizinan/store', [PerizinanController::class, 'store'])
        ->name('perizinan.store');

    Route::post('/perizinan/update', [PerizinanController::class, 'update'])
        ->name('perizinan.update');

    Route::post('/perizinan/delete', [PerizinanController::class, 'destroy'])
        ->name('perizinan.delete');

    Route::get('/karyawan/perizinan', [PerizinanController::class, 'index'])
        ->name('karyawan.perizinan');

    Route::get('/karyawan/presensi/', [PresensiController::class, 'index'])
        ->name('karyawan.presensi');

    Route::post('/presensi/store', [PresensiController::class, 'store'])
        ->name('presensi.store');

    Route::get('/karyawan/kasbon/', [KaryawanKasbonController::class, 'index'])
        ->name('karyawan.kasbon');

    Route::post('/kasbon/store/', [KaryawanKasbonController::class, 'save'])
        ->name('kasbon.save');

    Route::get('/kasbon/limit/', [KaryawanKasbonController::class, 'getSisaLimit'])
        ->name('kasbon.limit');

    Route::post('/kasbon/payment/', [KaryawanKasbonController::class, 'pay'])
        ->name('kasbon.payment');

    Route::get('/karyawan/gaji/', function () {
        return view('/karyawan/gaji');
    })->name('karyawan.gaji');
});

// BAGIAN HALAMAN SUPERVISOR
Route::middleware(['auth', 'role:supervisor'])->group(function () {
    Route::get('/supervisor/beranda/', function () {
        return view('/supervisor/beranda', [
            "title" => "Beranda"
        ]);
    })->name('supervisor.beranda');

    Route::get('/supervisor/perizinan/', [supervisorPerizinanController::class, 'index'])
        ->name('supervisor.perizinan');

    Route::post('/perizinan/update-status', [supervisorPerizinanController::class, 'updateStatus'])
        ->name('perizinan.update-status');

    Route::get('/supervisor/pembayaran/', [supervisorPembayaranController::class, 'index'])
        ->name('supervisor.pembayaran');

    Route::post('/kasbon/{id}/update', [supervisorPembayaranController::class, 'update'])
        ->name('kasbon.update');

    Route::get('/supervisor/kasbon/', [SupervisorPengajuanController::class, 'index'])
        ->name('supervisor.pengajuan');

    Route::get('/supervisor/infokaryawan', [SupervisorController::class, 'infokaryawan'])
        ->name('supervisor.infokaryawan');
});

// BAGIAN HALAMAN MANAJER
Route::middleware(['auth', 'role:manajer'])->group(function () {
    Route::get('/manajer/beranda/', function () {
        return view('/manajer/beranda', [
            "title" => "Beranda"
        ]);
    })->name('manager.beranda');

    Route::get('/manajer/gaji', [EmployerSalaryController::class, 'index'])
        ->name('manajer.gaji');

    // mengupdate status pengiriman gaji
    Route::post('/manajer/gaji/kirim/{karyawan_nip}', [EmployerSalaryController::class, 'updateStatus'])->name('manajer.gaji.kirim');

    // Menampilkan halaman edit karyawan manajer
    Route::get('/manajer/editkaryawan', function () {
        return view('manajer.editkaryawan');
    })->name('manajer.editkaryawan');

    Route::get('/karyawan', [KaryawanController::class, 'karyawans'])
        ->name('manajer.editkaryawan');

    Route::post('/karyawan/save', [KaryawanController::class, 'save'])
        ->name('karyawan.save');

    Route::delete('/karyawan/{id}/delete', [KaryawanController::class, 'delete'])
        ->name('karyawan.delete');

    // Menampilkan halaman edit karyawan
    Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])
        ->name('karyawan.edit');

    // Route untuk update data karyawan
    Route::put('/karyawan/{id}/update', [KaryawanController::class, 'update'])
        ->name('karyawan.update');

    // Route untuk menambah karyawan
    Route::get('/karyawan/create', [KaryawanController::class, 'create'])
        ->name('karyawan.create');

    Route::post('/karyawan', [KaryawanController::class, 'store'])
        ->name('karyawan.store');
    
    Route::get('karyawan/search', [KaryawanController::class, 'search'])->name('karyawan.search');

});

// Fitur reset password

// Forgot Password
Route::get('forgot-password', [ForgotPasswordController::class, 'create'])->middleware('guest')->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest')->name('password.email');

// Reset Password
Route::get('reset-password/{token}', [ResetPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('reset-password', [ResetPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

//Mengambil data untuk ditampilkan ke grafik
Route::get('/api/chart-data', [AttendanceController::class, 'getChartData']);

//Mengambil data pilihan untuk ditampilkan pada grafik
Route::get('/api/index-data', [AttendanceController::class, 'index']);
