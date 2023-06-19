<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Jadwal;
use Illuminate\Http\Request;

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
}
