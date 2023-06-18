<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DesaController extends Controller
{
    public function index()
    {
        $desas = Desa::latest()->get();
        return view('dashboard.p3b3k.desa.index', compact('desas'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_desa' => 'required',
            'alamat_desa' => 'required'
        ]);


        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }

        $desa = new Desa();
        $desa->kode = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $desa->nama_desa = $request->nama_desa;
        $desa->alamat_desa = $request->alamat_desa;
        $desa->save();

        Alert::toast('Berhasil tambah data desa', 'success');
        return back();
    }

    public function update(Request $request, Desa $desa)
    {
        $validasi = Validator::make($request->all(), [
            'nama_desa' => 'required',
            'alamat_desa' => 'required'
        ]);


        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }

        $desa->update([
            'nama_desa' => $request->nama_desa,
            'alamat_desa' => $request->alamat_desa
        ]);

        Alert::toast('Berhasil ubah data desa', 'success');
        return back();
    }

    public function destroy(Desa $desa)
    {
        $desa->delete();
        Alert::toast('Berhasil hapus data desa', 'success');
        return back();
    }
}
