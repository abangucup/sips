<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::latest()->get();
        $desas = Desa::all();
        return view('dashboard.p3b3k.lokasi.index', compact('lokasis', 'desas'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'desa' => 'required',
            'nama_lokasi' => 'required',
        ]);


        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }

        $lokasi = new lokasi();
        $lokasi->desa_id = $request->desa;
        $lokasi->nama_lokasi = $request->nama_lokasi;
        $lokasi->save();

        Alert::toast('Berhasil tambah data lokasi', 'success');
        return back();
    }

    public function update(Request $request, Lokasi $lokasi)
    {
        $validasi = Validator::make($request->all(), [
            'desa' => 'required',
            'nama_lokasi' => 'required',
        ]);


        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }

        $lokasi->update([
            'desa_id' => $request->desa,
            'nama_lokasi' => $request->nama_lokasi,
        ]);

        Alert::toast('Berhasil ubah data lokasi', 'success');
        return back();
    }

    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        Alert::toast('Berhasil hapus data lokasi', 'success');
        return back();
    }
}
