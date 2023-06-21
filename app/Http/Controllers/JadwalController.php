<?php

namespace App\Http\Controllers;

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
        $lokasis = Lokasi::all();
        $kenderaans = Kenderaan::all();
        $haris = Hari::all();
        $jadwals = Jadwal::all();
        return view('dashboard.p3b3k.jadwal.index', compact('lokasis', 'kenderaans', 'haris', 'jadwals'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $validasi = Validator::make($request->all(), [
        //     'kenderaan' => 'required',
        //     'hari' => 'required',
        //     'lokasi' => 'required',
        // ]);


        // if ($validasi->fails()) {
        //     Alert::toast('Gagal tambah data', 'error');
        //     return back();
        // }

        // $jadwal = new Jadwal();
        // $jadwal->kenderaan_id = $request->kenderaan;
        // $jadwal->hari_id = $request->hari;
        // $jadwal->lokasi_id = $request->lokasi;
        // $jadwal->save();

        // $validatedData = $request->validate([
        //     'kenderaan' => 'required',
        //     'hari' => 'required|array',
        //     'lokasi' => 'required|array',
        // ]);

        // // Ambil data kenderaan berdasarkan ID
        // $kenderaan = Kenderaan::findOrFail($validatedData['kenderaan']);

        // // Looping untuk menyimpan jadwal per hari
        // foreach ($validatedData['hari'] as $key => $hariId) {
        //     // Ambil data hari berdasarkan ID
        //     $hari = Hari::findOrFail($hariId);

        //     // Ambil data lokasi berdasarkan ID
        //     $lokasi = Lokasi::findOrFail($validatedData['lokasi'][$key]);

        //     // Buat jadwal baru
        //     $jadwal = new Jadwal();
        //     $jadwal->kenderaan()->associate($kenderaan);
        //     $jadwal->hari()->associate($hari);
        //     $jadwal->lokasi()->associate($lokasi);
        //     $jadwal->save();
        // }

        $validatedData = $request->validate([
            'kenderaan' => 'required',
            'hari' => 'required|array',
            'lokasi' => 'required|array',
        ]);

        // Ambil data kenderaan berdasarkan ID
        $kenderaan = Kenderaan::findOrFail($validatedData['kenderaan']);

        // Looping untuk menyimpan jadwal per hari
        foreach ($validatedData['hari'] as $hariId) {
            // Ambil data hari berdasarkan ID
            $hari = Hari::findOrFail($hariId);

            // Ambil data lokasi berdasarkan ID yang diinput
            $lokasiIds = $validatedData['lokasi'];

            // Looping untuk menyimpan jadwal per lokasi
            foreach ($lokasiIds as $lokasiId) {
                // Ambil data lokasi berdasarkan ID
                $lokasi = Lokasi::findOrFail($lokasiId);

                // Buat jadwal baru
                $jadwal = new Jadwal();
                $jadwal->kenderaan()->associate($kenderaan);
                $jadwal->hari()->associate($hari);
                $jadwal->lokasi()->associate($lokasi);
                $jadwal->save();
            }
        }
        Alert::toast('Berhasil tambah data jadwal', 'success');
        return back();
    }
}
