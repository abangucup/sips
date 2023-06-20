<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_hari',
    ];

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class);
    }
}
