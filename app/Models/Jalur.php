<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jalur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jalur',
    ];

    public function kenderaan()
    {
        return $this->hasMany(Kenderaan::class);
    }
}
