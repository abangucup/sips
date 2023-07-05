<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'timbulan_sampah',
        'pengurangan_sampah',
        'penanganan_sampah',
        'sampah_terkelola',
        'sampah_tidak_terkelola'
    ];
}
