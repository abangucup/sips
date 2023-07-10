<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Pelanggan;
use App\Models\Tarif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::where('desa_id', auth()->user()->desa_id)->get();
        $tarifs = Tarif::all();
        return view('dashboard.desa.pelanggan.index', compact('pelanggans', 'tarifs'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pelanggan' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
            'tarif' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        $desa = Desa::where('id', auth()->user()->desa_id)->first();

        $pelanggan = new Pelanggan();
        $pelanggan->desa_id = $desa->id;
        $pelanggan->tarif_id = $request->tarif;
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->nomor_hp = $request->nomor_hp;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->save();

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = 'pelanggan';
        $user->pelanggan_id = $pelanggan->id;
        $user->save();

        Alert::toast('Berhasil tambah pelanggan', 'success');
        return back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tarif' => 'required',
            'nama_pelanggan' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update([
            'tarif_id' => $request->tarif,
            'nama_pelanggan' => $request->nama_pelanggan,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
        ]);

        if ($request->filled('username')) {
            $pelanggan->user->update([
                'username' => $request->username,
            ]);
        }

        if ($request->filled('password')) {
            $pelanggan->user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        Alert::toast('Berhasil ubah data pelanggan', 'success');
        return back();
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        Alert::toast('Berhasil hapus pelanggan', 'success');
        return back();
    }
}
