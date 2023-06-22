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
        // $lokasis = Lokasi::all();
        // $kenderaans = Kenderaan::all();
        // $haris = Hari::all();
        $desas = Desa::all();
        $jadwals = Jadwal::latest()->get();
        return view('dashboard.p3b3k.jadwal.index', compact('jadwals', 'desas'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_sopir' => 'required',
            'jenis' => 'required',
            'nomor_polisi' => 'required',
            'hari_pelayanan' => 'required',
            'jalur' => 'required',
            'desa' => 'required'
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }

        $jadwal = new Jadwal();
        $jadwal->nama_sopir = $request->nama_sopir;
        $jadwal->nomor_polisi = $request->nomor_polisi;
        $jadwal->jenis = $request->jenis;
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
            'nama_sopir' => 'required',
            'jenis' => 'required',
            'nomor_polisi' => 'required',
            'hari_pelayanan' => 'required',
            'jalur' => 'required',
            'desa' => 'required'
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal tambah data', 'error');
            return back();
        }

        $jadwal->update([
            'nama_sopir' => $request->nama_sopir,
            'jenis' => $request->jenis,
            'nomor_polisi' => $request->nomor_polisi,
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
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'kenderaan' => 'required',
    //         'hari' => 'required|array',
    //         'lokasi' => 'required|array',
    //     ]);

    //     // Ambil data kenderaan berdasarkan ID
    //     $kenderaan = Kenderaan::findOrFail($validatedData['kenderaan']);

    //     // Looping untuk menyimpan jadwal per hari
    //     foreach ($validatedData['hari'] as $hariId) {
    //         // Ambil data hari berdasarkan ID
    //         $hari = Hari::findOrFail($hariId);

    //         // Ambil data lokasi berdasarkan ID yang diinput
    //         $lokasiIds = $validatedData['lokasi'];

    //         // Looping untuk menyimpan jadwal per lokasi
    //         foreach ($lokasiIds as $lokasiId) {
    //             // Ambil data lokasi berdasarkan ID
    //             $lokasi = Lokasi::findOrFail($lokasiId);

    //             // Buat jadwal baru
    //             $jadwal = new Jadwal();
    //             $jadwal->kenderaan()->associate($kenderaan);
    //             $jadwal->hari()->associate($hari);
    //             $jadwal->lokasi()->associate($lokasi);
    //             $jadwal->save();
    //         }
    //     }
    //     Alert::toast('Berhasil tambah data jadwal', 'success');
    //     return back();
    // }
}
