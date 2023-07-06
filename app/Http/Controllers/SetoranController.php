<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pelanggan;
use App\Models\Sampah;
use App\Models\Setoran;
use App\Models\Tarif;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SetoranController extends Controller
{
    public function index()
    {
        $setorans = Setoran::all();
        $pelanggans = Pelanggan::all();
        $jadwals = Jadwal::all();
        $tarifs = Tarif::all();
        $sampahs = Sampah::all();
        return view('dashboard.desa.setoran.index', compact('setorans', 'pelanggans', 'jadwals', 'tarifs', 'sampahs'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'pelanggan_id' => 'required',
            'tanggal_setoran' => 'required',
            'jadwal_id' => 'required',
            'tarif_id' => 'required',
        ]);

        $setoran = new Setoran();
        $setoran->pelanggan_id = $request->pelanggan_id;
        $setoran->tanggal_setoran = $request->tanggal_setoran;
        $setoran->jadwal_id = $request->jadwal_id;
        $setoran->tarif_id = $request->tarif_id;
        $setoran->save();

        Alert::toast('Berhasil tambah data setoran', 'success');
        return back();
    }
}
