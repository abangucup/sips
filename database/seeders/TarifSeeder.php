<?php

namespace Database\Seeders;

use App\Models\Tarif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tarifs = [
            [
                'sumber_sampah' => 'Sampah Rumah Tangga',
                'kategori' => 'sampah_non_organik',
                'tarif' => 10000,
            ],
            [
                'sumber_sampah' => 'Perkantoran',
                'kategori' => 'sampah_non_organik',
                'tarif' => 5000,
            ],
            [
                'sumber_sampah' => 'Pasar',
                'kategori' => 'sampah_organik',
                'tarif' => 1000,
            ],
            [
                'sumber_sampah' => 'Pertokoan',
                'kategori' => 'sampah_non_organik',
                'tarif' => 5000,
            ],
            [
                'sumber_sampah' => 'Fasilitas Publik',
                'kategori' => 'sampah_non_organik',
                'tarif' => 10000,
            ],
            [
                'sumber_sampah' => 'Kawasan',
                'kategori' => 'sampah_organik',
                'tarif' => 25000,
            ],
        ];

        foreach ($tarifs as $tarif) {
            Tarif::create($tarif);
        }
    }
}
