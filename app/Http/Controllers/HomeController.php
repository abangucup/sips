<?php

namespace App\Http\Controllers;

use App\Models\Capaian;
use App\Models\Desa;
use App\Models\Jadwal;
use App\Models\Kenderaan;;

use App\Models\Tarif;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $capaian = Capaian::latest()->first();
        return view('home.index', compact('capaian'));
    }

    public function listDesa()
    {
        $desas = Desa::latest()->withCount('jadwal', 'pelanggans')->get();
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
