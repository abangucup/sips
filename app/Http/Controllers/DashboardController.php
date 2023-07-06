<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Jadwal;
use App\Models\Jalur;
use App\Models\JenisSampah;
use App\Models\Kenderaan;
use App\Models\Kendraan;
use App\Models\Lokasi;
use App\Models\Pelanggan;
use App\Models\Sampah;
use App\Models\Setoran;
use App\Models\Tarif;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function p3b3k()
    {
        $desaCount = Desa::count();
        $sampahCount = Sampah::count();
        $tarifCount = Tarif::count();
        $jadwalCount = Jadwal::count();
        $kendraanCount = Kenderaan::count();
        return view('dashboard.p3b3k.dashboard', compact(
            'desaCount',
            'sampahCount',
            'tarifCount',
            'jadwalCount',
            'kendraanCount',
        ));
    }

    public function desa()
    {
        $countPelanggan = Pelanggan::count();
        $countSetoran = Setoran::count();
        return view('dashboard.desa.dashboard', compact('countPelanggan',  'countSetoran'));
    }

    public function pelanggan()
    {
        $countSetoran = Setoran::count();
        return view('dashboard.pelanggan.dashboard', compact('countSetoran'));
    }
}
