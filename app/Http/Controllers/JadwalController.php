<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Kenderaan;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class JadwalController extends Controller
{
    public function index()
    {
        $kenderaans = Kenderaan::all();
        $desas = Desa::all();
        $jadwals = Jadwal::latest()->get();
        return view('dashboard.p3b3k.jadwal.index', compact('jadwals', 'desas', 'kenderaans'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'kenderaan' => 'required',
            'hari_pelayanan' => 'required',
            'jalur' => 'required',
            'desa' => 'required'
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }
        $kenderaan = Kenderaan::findOrFail($request->kenderaan);

        $jadwal = new Jadwal();
        $jadwal->kenderaan_id = $kenderaan->id;
        $jadwal->jenis = $kenderaan->jenis;
        $jadwal->hari_pelayanan = $request->hari_pelayanan;
        $jadwal->jalur = $request->jalur;
        $jadwal->desa_id = $request->desa;
        $jadwal->save();

        Alert::toast('Berhasi tambah data', 'success');
        return back();
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $validasi = Validator::make($request->all(), [
            'kenderaan' => 'required',
            'hari_pelayanan' => 'required',
            'jalur' => 'required',
            'desa' => 'required'
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }
        $kenderaan = Kenderaan::findOrFail($request->kenderaan);

        $jadwal->update([
            'kenderaan_id' => $request->kenderaan,
            'jenis' => $kenderaan->jenis,
            'hari_pelayanan' => $request->hari_pelayanan,
            'jalur' => $request->jalur,
            'desa_id' => $request->desa
        ]);

        Alert::toast('Berhasi ubah data jadwal', 'success');
        return back();
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        Alert::toast('Berhasil hapus data jadwal', 'success');
        return back();
    }
}
