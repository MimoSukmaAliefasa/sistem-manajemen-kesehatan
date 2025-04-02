<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RiwayatController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dokter', [HomeController::class, 'dokter'])->name('dokter');
Route::get('/pasien', [HomeController::class, 'pasien'])->name('pasien');
Route::prefix('dokter')->group(function(){
    Route::resource('periksa', PeriksaController::class);
    Route::resource('obat', ObatController::class);
});
Route::prefix('pasien')->group(function(){
    Route::resource('periksa', PeriksaController::class);
    Route::resource('riwayat', RiwayatController::class);
});

