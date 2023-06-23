<?php

namespace App\Http\Controllers;

use App\Models\Jalur;
use App\Models\Kenderaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KenderaanController extends Controller
{
    public function index()
    {
        $kenderaans = Kenderaan::latest()->get();
        $jalurs = Jalur::all();
        return view('dashboard.p3b3k.kenderaan.index', compact('kenderaans', 'jalurs'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'jenis' => 'required',
            'nama_kenderaan' => 'required',
            'nomor_polisi' => 'required',
            'nama_sopir' => 'required',
        ]);


        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }

        $kenderaan = new Kenderaan();
        $kenderaan->jenis = $request->jenis;
        $kenderaan->kode_kenderaan = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $kenderaan->nama_kenderaan = $request->nama_kenderaan;
        $kenderaan->nomor_polisi = $request->nomor_polisi;
        $kenderaan->nama_sopir = $request->nama_sopir;
        $kenderaan->save();

        Alert::toast('Berhasil tambah data kenderaan', 'success');
        return back();
    }

    public function update(Request $request, Kenderaan $kenderaan)
    {
        $validasi = Validator::make($request->all(), [
            'jenis' => 'required',
            'nama_kenderaan' => 'required',
            'nomor_polisi' => 'required',
            'nama_sopir' => 'required',
        ]);


        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }

        $kenderaan->update([
            'jenis' => $request->jenis,
            'nama_kenderaan' => $request->nama_kenderaan,
            'nomor_polisi' => $request->nomor_polisi,
            'nama_sopir' => $request->nama_sopir,
        ]);

        Alert::toast('Berhasil ubah data kenderaan', 'success');
        return back();
    }

    public function destroy(Kenderaan $kenderaan)
    {
        $kenderaan->delete();
        Alert::toast('Berhasil hapus data kenderaan', 'success');
        return back();
    }
}
