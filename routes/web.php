<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\supervisorPerizinanController;
use App\Http\Controllers\supervisorPembayaranController;
use App\Http\Controllers\SupervisorPengajuanController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\KaryawanKasbonController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\EmployerSalaryController;

Route::get('/', function () {
    return view('welcome');
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

// Menampilkan halaman karyawan
Route::get('/karyawan/atur/', function () {
    return view('/karyawan/atur');
});

Route::get('/karyawan/lihat/', function () {
    return view('/karyawan/lihat');
});

Route::get('/karyawan/beranda/', function () {
    return view('/karyawan/beranda');
})->name('karyawan.beranda');

Route::post('/perizinan/store', [PerizinanController::class, 'store'])->name('perizinan.store');
Route::post('/perizinan/update', [PerizinanController::class, 'update'])->name('perizinan.update');
Route::post('/perizinan/delete', [PerizinanController::class, 'destroy'])->name('perizinan.delete');
Route::get('/karyawan/perizinan', [PerizinanController::class, 'index'])->name('karyawan.perizinan');

Route::get('/karyawan/presensi/', [PresensiController::class, 'index'])->name('karyawan.presensi');

Route::post('/presensi/store', [PresensiController::class, 'store'])->name('presensi.store');

// Route::get('/karyawan/kasbon/', function () {
//     return view('/karyawan/kasbon');
// })->name('karyawan.kasbon');

// Halaman kasbon karyawan

Route::get('/karyawan/kasbon/', [KaryawanKasbonController::class, 'index'])->name('karyawan.kasbon');

Route::post('/kasbon/store/', [KaryawanKasbonController::class, 'save'])->name('kasbon.save');

Route::get('/kasbon/limit/', [KaryawanKasbonController::class, 'getSisaLimit'])->name('kasbon.limit');

Route::post('/kasbon/payment/', [KaryawanKasbonController::class, 'pay'])->name('kasbon.payment');

Route::get('/karyawan/gaji/', function () {
    return view('/karyawan/gaji');
})->name('karyawan.gaji');

// Menampilkan halaman supervisor

Route::get('/supervisor/beranda/', function () {
    return view('/supervisor/beranda', [
        "title" => "Beranda"
    ]);
})->name('supervisor.beranda');

Route::get('/supervisor/perizinan/', [supervisorPerizinanController::class, 'index'])->name('supervisor.perizinan');

Route::post('/perizinan/update-status', [supervisorPerizinanController::class, 'updateStatus'])->name('perizinan.update-status');

// Route::get('/supervisor/pembayaran/', function () {
//     return view('/supervisor/pembayaran', [
//         "title" => "Pembayaran"
//     ]);
// })->name('supervisor.pembayaran');

Route::get('/supervisor/pembayaran/', [supervisorPembayaranController::class, 'index'])->name('supervisor.pembayaran');

Route::post('/kasbon/{id}/update', [supervisorPembayaranController::class, 'update'])->name('kasbon.update');

// Route::get('/supervisor/kasbon/', function () {
//     return view('/supervisor/pengajuan', [
//         "title" => "Pengajuan"
//     ]);
// })->name('supervisor.pengajuan');

Route::get('/supervisor/kasbon/', [SupervisorPengajuanController::class, 'index'])->name('supervisor.pengajuan');

Route::get('/supervisor/infokaryawan', [SupervisorController::class, 'infokaryawan'])->name('supervisor.infokaryawan');


// Menampilkan halaman manager
Route::get('/manajer/beranda/', function () {
    return view('/manajer/beranda');
})->name('manager.beranda');

Route::get('/manajer/gaji', [EmployerSalaryController::class, 'index'])->name('manajer.gaji');

// Mengambil data untuk ditampilkan ke grafik
Route::get('/api/chart-data', [ChartController::class, 'getChartData']);

// Menampilkan halaman edit karyawan manajer
Route::get('/editkaryawan', function () {
    return view('manajer.editkaryawan');
})->name('manajer.editkaryawan');

Route::get('/karyawan', [EditKaryawanController::class, 'karyawans'])->name('manajer.editkaryawan');
Route::post('/karyawan/save', [EditKaryawanController::class, 'save'])->name('karyawan.save');
Route::delete('/karyawan/{id}/delete', [EditKaryawanController::class, 'delete'])->name('karyawan.delete');
// Menampilkan halaman edit karyawan
Route::get('/karyawan/{id}/edit', [EditKaryawanController::class, 'edit'])->name('karyawan.edit');
// Route untuk update data karyawan
Route::put('/karyawan/{id}/update', [EditKaryawanController::class, 'update'])->name('karyawan.update');
// Route untuk menambah karyawan
Route::get('/karyawan/create', [EditKaryawanController::class, 'create'])->name('karyawan.create');
Route::post('/karyawan', [EditKaryawanController::class, 'store'])->name('karyawan.store');