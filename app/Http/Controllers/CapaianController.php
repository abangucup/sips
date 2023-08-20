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
            'pembatasan_timbulan' => 'required',
            'pemanfaatan_kembali' => 'required',
            'daur_ulang' => 'required',
            'penanganan_sampah' => 'required',
            'pemilahan' => 'required',
            'pengangkutan' => 'required',
            'pengolahan' => 'required',
            'pemrosesan_akhir' => 'required',
            'sampah_terkelola' => 'required',
            'sampah_tidak_terkelola' => 'required',
            'tahun' => 'required',
        ]);

        $capaian = new Capaian();
        $capaian->timbulan_sampah = $request->timbulan_sampah;
        $capaian->pengurangan_sampah = $request->pengurangan_sampah;
        $capaian->pembatasan_timbulan = $request->pembatasan_timbulan;
        $capaian->pemanfaatan_kembali = $request->pemanfaatan_kembali;
        $capaian->daur_ulang = $request->daur_ulang;
        $capaian->penanganan_sampah = $request->penanganan_sampah;
        $capaian->pemilahan = $request->pemilahan;
        $capaian->pengangkutan = $request->pengangkutan;
        $capaian->pengolahan = $request->pengolahan;
        $capaian->pemrosesan_akhir = $request->pemrosesan_akhir;
        $capaian->sampah_terkelola = $request->sampah_terkelola;
        $capaian->sampah_tidak_terkelola = $request->sampah_tidak_terkelola;
        $capaian->tahun = $request->tahun;
        $capaian->save();

        Alert::toast('Berhasil simpan capaian', 'success');
        return back();
    }

    public function update(Request $request)
    {
        dd($request->all());
    }
}
