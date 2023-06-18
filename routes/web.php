<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\SampahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('storeLogin');
});


Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => ['role:p3b3k'], 'prefix' => 'p3b3k'], function () {
        Route::get('/dashboard', [DashboardController::class, 'p3b3k'])->name('dashboard.p3b3k');
        Route::resource('/desa', DesaController::class);
        Route::resource('/jenis', JenisSampahController::class);
        Route::resource('/sampah', SampahController::class);
        Route::resource('/jadwal', JadwalController::class);
    });

    Route::group(['middleware' => ['role:desa'], 'prefix' => 'desa'], function () {
        Route::get('/dashboard', [DashboardController::class, 'desa'])->name('dashboard.desa');
    });

    Route::group(['middleware' => ['role:pelanggan'], 'prefix' => 'pelanggan'], function () {
        Route::get('/dashboard', [DashboardController::class, 'pelanggan'])->name('dashboard.pelanggan');
    });

    Route::group(['middleware' => ['role:petugas'], 'prefix' => 'petugas'], function () {
        Route::get('/dashboard', [DashboardController::class, 'petugas'])->name('dashboard.petugas');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
