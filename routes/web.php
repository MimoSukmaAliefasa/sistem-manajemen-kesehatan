<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\CekRole;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.submit');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');


Route::get('/dokter', [HomeController::class, 'dokter'])->name('dokter');
Route::get('/pasien', [HomeController::class, 'pasien'])->name('pasien');
Route::prefix('dokter')->group(function(){;
    Route::get('/periksa', [PeriksaController::class, 'getPeriksaDokter'])->name('periksadokter');
    Route::post('/periksa', [PeriksaController::class, 'store'])->name('periksa.store');
    Route::get('/obat', [ObatController::class, 'index'])->name('obat');
});

Route::middleware(['auth', CekRole::class . ":pasien"])->group(function () {
Route::prefix('pasien')->group(function(){
    Route::resource('periksa', PeriksaController::class);
    Route::resource('riwayat', RiwayatController::class);
});
});

