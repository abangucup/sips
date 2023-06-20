<?php

namespace Database\Seeders;

use App\Models\Hari;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $haris = [
            [
                'nama_hari' => 'Senin'
            ],
            [
                'nama_hari' => 'Selasa'
            ],
            [
                'nama_hari' => 'Rabu'
            ],
            [
                'nama_hari' => 'Kamis'
            ],
            [
                'nama_hari' => "Jum'at"
            ],
            [
                'nama_hari' => 'Sabtu'
            ],
            [
                'nama_hari' => 'Minggu'
            ],
        ];

        foreach ($haris as $hari) {
            Hari::create($hari);
        }
    }
}
