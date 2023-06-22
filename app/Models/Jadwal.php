<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'kenderaan_id',
        'jenis',
        'hari_pelayanan',
        'jalur',
        'desa_id',
    ];

    public function kenderaan()
    {
        return $this->belongsTo(Kenderaan::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    // public function kenderaan()
    // {
    //     return $this->belongsTo(Kenderaan::class);
    // }

    // public function hari()
    // {
    //     return $this->belongsTo(Hari::class);
    // }

    // public function lokasi()
    // {
    //     return $this->belongsTo(Lokasi::class);
    // }
}
