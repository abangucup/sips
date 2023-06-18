<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Jadwal;
use App\Models\JenisSampah;
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
        return view('dashboard.p3b3k.dashboard', compact('desaCount', 'jenisCount', 'sampahCount', 'jadwalCount'));
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
