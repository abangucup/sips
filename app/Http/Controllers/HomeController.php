<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Jadwal;
use App\Models\Kenderaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        return view('home.index');
    }

    public function listDesa()
    {
        $desas = Desa::latest()->get();
        return view('home.list_desa', compact('desas'));
    }

    public function listJadwal()
    {
        $jadwals = Jadwal::latest()->get();
        return view('home.list_jadwal', compact('jadwals'));
    }

    public function detailDesa(Desa $desa)
    {
        $kenderaans = Kenderaan::latest()->get();
        $jadwals = Jadwal::all();
        return view('home.detail_desa', compact('jadwals', 'desa', 'kenderaans'));
    }
}
