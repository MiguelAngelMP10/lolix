<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartidoPolitico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];

    public function ciudadanos(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Ciudadano::class, 'ciudadano_partidos_politicos');
    }
}
