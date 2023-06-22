<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Jadwal;
use App\Models\Kenderaan;
use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $tarifs = Tarif::all();
        return view('home.index', compact('tarifs'));
    }

    public function listDesa()
    {
        $desas = Desa::latest()->get();
        return view('home.list_desa', compact('desas'));
    }

    public function listTarif()
    {
        $tarifs = Tarif::all();
        return view('home.list_tarif', compact('tarifs'));
    }

    public function listJadwal()
    {
        $jadwals = Jadwal::latest()->get();
        return view('home.list_jadwal', compact('jadwals'));
    }

    public function detailDesa(Desa $desa)
    {
        return view('home.detail_desa', compact('desa'));
    }
}
