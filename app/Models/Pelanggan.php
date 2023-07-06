<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelanggan',
        'nomor_hp',
        'alamat',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function setoran()
    {
        return $this->hasMany(Setoran::class);
    }
}
