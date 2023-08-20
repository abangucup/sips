<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alamat = 'Kec. Marisa, Kabupaten Pohuwato, Gorontalo';
        $desas = [
            [
                'kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), //1
                'nama_desa' => 'Marisa Utara',
                'alamat_desa' => $alamat
            ],
            [
                'kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), //2
                'nama_desa' => 'Teratai',
                'alamat_desa' => $alamat
            ],
            [
                'kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), //3
                'nama_desa' => 'Pohuwato Timur',
                'alamat_desa' => $alamat
            ],
            [
                'kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), //4
                'nama_desa' => 'Bulangita',
                'alamat_desa' => $alamat
            ],
            [
                'kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), //5
                'nama_desa' => 'Palopo',
                'alamat_desa' => $alamat
            ],
            [
                'kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), //6
                'nama_desa' => 'Pohuwato',
                'alamat_desa' => $alamat
            ],
            [
                'kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), //7
                'nama_desa' => 'Botubilotahu',
                'alamat_desa' => $alamat
            ],
            [
                'kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), //8
                'nama_desa' => 'Marisa Selatan',
                'alamat_desa' => $alamat
            ],
        ];

        foreach ($desas as $desa) {
            Desa::create($desa);
        }
    }
}
