<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Jalur;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        return view('dashboard.p3b3k.laporan.index');
    }

    public function cetakLaporan()
    {
        $jadwals = Jadwal::all();
        $jalurs = Jalur::all();
        // return view('dashboard.p3b3k.laporan.cetak', compact('jadwals'));
        $pdf = Pdf::loadview('dashboard.p3b3k.laporan.cetak', compact('jadwals', 'jalurs'))->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
}
