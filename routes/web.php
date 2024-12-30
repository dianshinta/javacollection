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

Route::get('/', function () {
    return view('welcome');
});

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

Route::post('/kasbon/{nip}/update', [supervisorPembayaranController::class, 'update'])->name('kasbon.update');

// Route::get('/supervisor/kasbon/', function () {
//     return view('/supervisor/pengajuan', [
//         "title" => "Pengajuan"
//     ]);
// })->name('supervisor.pengajuan');

Route::get('/supervisor/kasbon/', [SupervisorPengajuanController::class, 'index'])->name('supervisor.pengajuan');

// Menampilkan halaman manager
Route::get('/manajer/beranda/', function () {
    return view('/manajer/beranda');
})->name('manager.beranda');

Route::get('/manajer/gaji', function() {
    return view('/manajer/gaji', [
        "title" => "Gaji"
    ]);
})->name('manajer.gaji');

// Menampilkan halaman login
Route::get('/login', function () {
    return view('auth.login'); // Pastikan ada file `auth/login.blade.php`
})->name('login');

// Mengambil data untuk ditampilkan ke grafik
Route::get('/api/chart-data', [ChartController::class, 'getChartData']);

