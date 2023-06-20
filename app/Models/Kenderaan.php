<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kenderaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jalur_id',
        'kode_kenderaan',
        'nama_kenderaan',
        'nomor_polisi',
        'nama_sopir',
        'gambar_kenderaan'
    ];

    public function jalur()
    {
        return $this->belongsTo(Jalur::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
