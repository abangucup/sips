<?php

namespace Database\Seeders;

use App\Models\Kenderaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KenderaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kenderaans = [
            [
                'jenis' => 'DUMPTRUCK',
                'kode_kenderaan' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'nama_kenderaan' => 'DUMTRUCK',
                'nomor_polisi' => 'DM 8502 D',
                'nama_sopir' => 'Arman Pakaya',
            ],
            [
                'jenis' => 'DUMPTRUCK',
                'kode_kenderaan' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'nama_kenderaan' => 'DUMTRUCK',
                'nomor_polisi' => 'DM 8041 A',
                'nama_sopir' => 'Marten Haras',
            ],
            [
                'jenis' => 'DUMPTRUCK',
                'kode_kenderaan' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'nama_kenderaan' => 'DUMTRUCK',
                'nomor_polisi' => 'DM 8043 D',
                'nama_sopir' => 'Rizki Mantu',
            ]
        ];

        foreach ($kenderaans as $kenderaan) {
            Kenderaan::create($kenderaan);
        }
    }
}
