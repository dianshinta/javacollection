<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawan/atur/', function () {
    return view('/karyawan/atur');
});

Route::get('/karyawan/lihat/', function () {
    return view('/karyawan/lihat');
});

Route::get('/karyawan/beranda/', function () {
    return view('/karyawan/beranda');
})->name('beranda');

Route::get('/karyawan/perizinan/', function () {
    return view('/karyawan/perizinan');
})->name('perizinan');

Route::get('/karyawan/presensi/', function () {
    return view('/karyawan/presensi');
})->name('presensi');

Route::get('/karyawan/kasbon/', function () {
    return view('/karyawan/kasbon');
})->name('kasbon');

Route::get('/supervisor/beranda/', function () {
    return view('/supervisor/beranda', [
        "title" => "Beranda"
    ]);
})->name('supervisor.beranda');

Route::get('/supervisor/perizinan/', function () {
    return view('/supervisor/perizinan', [
        "title" => "Perizinan"
    ]);
})->name('supervisor.perizinan');