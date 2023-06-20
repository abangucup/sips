<?php

namespace App\Http\Controllers;

use App\Models\Jalur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class JalurController extends Controller
{
    public function index()
    {
        $jalurs = Jalur::latest()->withCount('kenderaan')->get();
        return view('dashboard.p3b3k.jalur.index', compact('jalurs'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_jalur' => 'required',
        ]);


        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }

        $jalur = new Jalur();
        $jalur->nama_jalur = $request->nama_jalur;
        $jalur->save();

        Alert::toast('Berhasil tambah data jalur', 'success');
        return back();
    }

    public function update(Request $request, Jalur $jalur)
    {
        $validasi = Validator::make($request->all(), [
            'nama_jalur' => 'required',
        ]);


        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }

        $jalur->update([
            'nama_jalur' => $request->nama_jalur,
        ]);

        Alert::toast('Berhasil ubah data jalur', 'success');
        return back();
    }

    public function destroy(Jalur $jalur)
    {
        $jalur->delete();
        Alert::toast('Berhasil hapus data jalur', 'success');
        return back();
    }
}
