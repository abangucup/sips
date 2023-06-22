<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode', 'nama_desa', 'alamat_desa'
    ];

    // public function lokasi()
    // {
    //     return $this->hasMany(Lokasi::class);
    // }
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
