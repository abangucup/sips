<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    protected $fillable = [
        'sumber_sampah',
        'kategori',
        'tarif'
    ];

    public function setoran()
    {
        return $this->hasMany(Setoran::class);
    }
}
