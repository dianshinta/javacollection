<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\supervisorPerizinanController;
use App\Http\Controllers\supervisorPembayaranController;

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

Route::get('/karyawan/perizinan/', function () {
    return view('/karyawan/perizinan');
})->name('karyawan.perizinan');

// Route::get('/karyawan/presensi/', function () {
//     return view('/karyawan/presensi');
// })->name('karyawan.presensi');

Route::get('/karyawan/presensi/', [PresensiController::class, 'index'])->name('karyawan.presensi');

Route::post('/presensi/store', [PresensiController::class, 'store'])->name('presensi.store');

Route::get('/karyawan/kasbon/', function () {
    return view('/karyawan/kasbon');
})->name('karyawan.kasbon');

// Menampilkan halaman supervisor

Route::get('/supervisor/beranda/', function () {
    return view('/supervisor/beranda', [
        "title" => "Beranda"
    ]);
})->name('supervisor.beranda');

// Route::get('/supervisor/beranda/', [supervisorPerizinanController::class, 'index'])->name('supervisor.beranda');

Route::get('/supervisor/perizinan/', [supervisorPerizinanController::class, 'index'])->name('supervisor.perizinan');

Route::post('/perizinan/update-status', [supervisorPerizinanController::class, 'updateStatus'])->name('perizinan.update-status');

// Route::get('/supervisor/pembayaran/', function () {
//     return view('/supervisor/pembayaran', [
//         "title" => "Pembayaran"
//     ]);
// })->name('supervisor.pembayaran');

Route::get('/supervisor/pembayaran/', [supervisorPembayaranController::class, 'index'])->name('supervisor.pembayaran');

Route::get('/supervisor/kasbon/', function () {
    return view('/supervisor/pengajuan', [
        "title" => "Pengajuan"
    ]);
})->name('supervisor.pengajuan');

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