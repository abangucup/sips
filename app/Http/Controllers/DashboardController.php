<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Jadwal;
use App\Models\Jalur;
use App\Models\JenisSampah;
use App\Models\Kenderaan;
use App\Models\Kendraan;
use App\Models\Lokasi;
use App\Models\Sampah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function p3b3k()
    {
        $desaCount = Desa::count();
        $jenisCount = JenisSampah::count();
        $sampahCount = Sampah::count();
        $jadwalCount = Jadwal::count();
        $kendraanCount = Kenderaan::count();
        $jalurCount = Jalur::count();
        $lokasiCount = Lokasi::count();
        return view('dashboard.p3b3k.dashboard', compact(
            'desaCount',
            'jenisCount',
            'sampahCount',
            'jadwalCount',
            'kendraanCount',
            'jalurCount',
            'lokasiCount',
        ));
    }

    public function desa()
    {
    }

    public function pelanggan()
    {
    }

    public function petugas()
    {
    }
}
