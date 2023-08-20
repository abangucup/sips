<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        // 'tarif_id',
        'nama_pelanggan',
        'nomor_hp',
        'alamat',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function setoran()
    {
        return $this->hasOne(Setoran::class);
    }

    // public function tarif()
    // {
    //     return $this->belongsTo(Tarif::class);
    // }
}
