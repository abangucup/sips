<?php

namespace App\Http\Controllers;

use App\Models\Capaian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CapaianController extends Controller
{
    public function index()
    {
        $capaians = Capaian::all();
        return view('dashboard.p3b3k.capaian.index', compact('capaians'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'timbulan_sampah' => 'required',
            'pengurangan_sampah' => 'required',
            'penanganan_sampah' => 'required',
            'sampah_terkelola' => 'required',
            'sampah_tidak_terkelola' => 'required',
            'tahun' => 'required',
        ]);

        $capaian = new Capaian();
        $capaian->timbulan_sampah = $request->timbulan_sampah;
        $capaian->pengurangan_sampah = $request->pengurangan_sampah;
        $capaian->penanganan_sampah = $request->penanganan_sampah;
        $capaian->sampah_terkelola = $request->sampah_terkelola;
        $capaian->sampah_tidak_terkelola = $request->sampah_tidak_terkelola;
        $capaian->tahun = $request->tahun;
        $capaian->save();

        Alert::toast('Berhasil simpan capaian', 'success');
        return back();
    }
}
