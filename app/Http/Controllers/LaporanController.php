<?php

namespace App\Http\Controllers;

use App\Models\Capaian;
use App\Models\Jadwal;
use App\Models\Jalur;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function retribusi()
    {
        return view('dashboard.p3b3k.laporan.laporan_retribusi');
    }

    public function cetakRetribusi()
    {
        // $jadwals = Jadwal::all();
        // $jalurs = Jalur::all();
        // return view('dashboard.p3b3k.laporan.cetak', compact('jadwals'));
        $pdf = Pdf::loadview('dashboard.p3b3k.laporan.cetak_retribusi', compact('jadwals', 'jalurs'))->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function capaian()
    {
        $capaians = Capaian::all();
        return view('dashboard.p3b3k.laporan.laporan_capaian', compact('capaians'));
    }

    public function cetakCapaian()
    {
        $capaians = Capaian::all();
        $pdf = Pdf::loadview('dashboard.p3b3k.laporan.cetak_capaian', compact('capaians'))->setPaper('A4', 'potrait');

        return $pdf->stream('laporan_capaian');
    }
}
