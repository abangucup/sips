<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CapaianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JalurController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\KenderaanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\SetoranController;
use App\Http\Controllers\TarifController;
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
Route::get('/list-desa', [HomeController::class, 'listDesa'])->name('list_desa');
Route::get('/list-jadwal', [HomeController::class, 'listJadwal'])->name('list_jadwal');
Route::get('/list-tarif', [HomeController::class, 'listTarif'])->name('list_tarif');
Route::get('/list-desa/{desa}', [HomeController::class, 'detailDesa'])->name('detail_desa');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('storeLogin');
});


Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => ['role:p3b3k'], 'prefix' => 'p3b3k'], function () {
        Route::get('/dashboard', [DashboardController::class, 'p3b3k'])->name('dashboard.p3b3k');
        Route::resource('/desa', DesaController::class);
        Route::resource('/sampah', SampahController::class);
        Route::resource('/tarif', TarifController::class);
        Route::resource('/jalur', JalurController::class);
        Route::resource('/kenderaan', KenderaanController::class);
        Route::resource('/lokasi', LokasiController::class);
        Route::resource('/jenis', JenisSampahController::class);
        Route::resource('/jadwal', JadwalController::class);
        Route::resource('/capaian', CapaianController::class);
        Route::get('/laporan/pengangkutan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/laporan/pengangkutan/cetak', [LaporanController::class, 'cetakLaporan'])->name('laporan.cetak');
    });

    Route::group(['middleware' => ['role:desa'], 'prefix' => 'desa'], function () {
        Route::get('/dashboard', [DashboardController::class, 'desa'])->name('dashboard.desa');
        Route::resource('/pelanggan', PelangganController::class);
    });

    Route::group(['middleware' => ['role:pelanggan'], 'prefix' => 'pelanggan'], function () {
        Route::get('/dashboard', [DashboardController::class, 'pelanggan'])->name('dashboard.pelanggan');
    });
    Route::resource('/setoran', SetoranController::class);

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
