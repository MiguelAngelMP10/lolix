<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function ciudadanos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ciudadano::class);
    }
}
