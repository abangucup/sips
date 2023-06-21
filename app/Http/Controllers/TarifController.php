<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TarifController extends Controller
{
    public function index()
    {
        $tarifs = Tarif::all();
        return view('dashboard.p3b3k.tarif.index', compact('tarifs'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'sumber_sampah' => 'required',
            'kategori' => 'required',
            'tarif' => 'required',
        ]);


        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }

        $tarif = new Tarif();
        $tarif->sumber_sampah = $request->sumber_sampah;
        $tarif->kategori = $request->kategori;
        $tarif->tarif = $request->tarif;
        $tarif->save();

        Alert::toast('Berhasil tambah data tarif', 'success');
        return back();
    }

    public function update(Request $request, Tarif $tarif)
    {
        $validasi = Validator::make($request->all(), [
            'sumber_sampah' => 'required',
            'kategori' => 'required',
            'tarif' => 'required',
        ]);


        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }

        $tarif->update([
            'sumber_sampah' => $request->sumber_sampah,
            'kategori' => $request->kategori,
            'tarif' => $request->tarif,
        ]);

        Alert::toast('Berhasil ubah data tarif', 'success');
        return back();
    }

    public function destroy(Tarif $tarif)
    {
        $tarif->delete();
        Alert::toast('Berhasil hapus data tarif', 'success');
        return back();
    }
}
