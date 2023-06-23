<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kenderaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
        'kode_kenderaan',
        'nama_kenderaan',
        'nomor_polisi',
        'nama_sopir',
        'gambar_kenderaan'
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
