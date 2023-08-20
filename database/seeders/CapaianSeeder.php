<?php

namespace Database\Seeders;

use App\Models\Capaian;
use Illuminate\Database\Seeder;

class CapaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Capaian::create([
            'timbulan_sampah' => 2156229,
            'pengurangan_sampah' => 745770,
            'penanganan_sampah' => 383805,
            'sampah_terkelola' => 1329575,
            'sampah_tidak_terkelola' => 826684,
            'pembatasan_timbulan' => 124593,
            'pemanfaatan_kembali' => 24424,
            'daur_ulang' => 769754,
            'pemilahan' => 0,
            'pengangkutan' => 0,
            'pengolahan' => 0,
            'pemrosesan_akhir' => 2920000,
            'tahun' => 'Tahun 2021',
        ]);
    }
}
