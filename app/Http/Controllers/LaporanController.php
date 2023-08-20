<?php

namespace App\Http\Controllers;

use App\Models\Capaian;
use App\Models\Jadwal;
use App\Models\Jalur;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function retribusi()
    {
        $pelanggans = Pelanggan::all();
        return view('dashboard.p3b3k.laporan.laporan_retribusi', compact('pelanggans'));
    }

    public function cetakRetribusi()
    {
        // $jadwals = Jadwal::all();
        $pelanggans = Pelanggan::all();
        $pdf = Pdf::loadview('dashboard.p3b3k.laporan.cetak_retribusi', compact('pelanggans'))->setPaper('A4', 'landscape');
        return $pdf->stream('laporan_retribusi');
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
