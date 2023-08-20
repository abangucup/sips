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

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function kenderaan()
    {
        return $this->belongsToMany(Kenderaan::class, Jadwal::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function pelanggans()
    {
        return $this->hasMany(Pelanggan::class);
    }
}
