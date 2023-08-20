<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SampahController extends Controller
{
    public function index()
    {
        $sampahs = Sampah::all();
        return view('dashboard.p3b3k.sampah.index', compact('sampahs'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_sampah' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required',
            'tahun' => 'required',
        ]);


        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }

        $desa = new Sampah();
        $desa->nama_sampah = $request->nama_sampah;
        $desa->kategori = $request->kategori;
        $desa->tahun = $request->tahun;
        $desa->jumlah = $request->jumlah;
        $desa->save();

        Alert::toast('Berhasil tambah data sampah', 'success');
        return back();
    }

    public function update(Request $request, Sampah $sampah)
    {
        $validasi = Validator::make($request->all(), [
            'nama_sampah' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required',
            'tahun' => 'required',
        ]);


        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }

        $sampah->update([
            'nama_sampah' => $request->nama_sampah,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'tahun' => $request->tahun,
        ]);

        Alert::toast('Berhasil ubah data sampah', 'success');
        return back();
    }

    public function destroy(Sampah $sampah)
    {
        $sampah->delete();
        Alert::toast('Berhasil hapus data sampah', 'success');
        return back();
    }
}
