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
            ['kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 'nama_desa' => 'Desa 4', 'alamat_desa' => 'Jalan Desa 4'],
            ['kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 'nama_desa' => 'Desa 5', 'alamat_desa' => 'Jalan Desa 5'],
            ['kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 'nama_desa' => 'Desa 6', 'alamat_desa' => 'Jalan Desa 6'],
            ['kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 'nama_desa' => 'Desa 7', 'alamat_desa' => 'Jalan Desa 7'],
            ['kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 'nama_desa' => 'Desa 8', 'alamat_desa' => 'Jalan Desa 8'],
            ['kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 'nama_desa' => 'Desa 9', 'alamat_desa' => 'Jalan Desa 9'],
            ['kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 'nama_desa' => 'Desa 10', 'alamat_desa' => 'Jalan Desa 10'],
            ['kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 'nama_desa' => 'Desa 11', 'alamat_desa' => 'Jalan Desa 11'],
            ['kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 'nama_desa' => 'Desa 12', 'alamat_desa' => 'Jalan Desa 12'],
            ['kode' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 'nama_desa' => 'Desa 13', 'alamat_desa' => 'Jalan Desa 13'],
        ];

        foreach ($desas as $desa) {
            Desa::create($desa);
        }
    }
}
