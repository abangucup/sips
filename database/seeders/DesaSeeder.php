<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $desas = [
            ['kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 'nama_desa' => 'Desa 1', 'alamat_desa' => 'Jalan Desa 1'],
            ['kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 'nama_desa' => 'Desa 2', 'alamat_desa' => 'Jalan Desa 2'],
            ['kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 'nama_desa' => 'Desa 3', 'alamat_desa' => 'Jalan Desa 3'],
        ];

        foreach ($desas as $desa) {
            Desa::create($desa);
        }
    }
}
