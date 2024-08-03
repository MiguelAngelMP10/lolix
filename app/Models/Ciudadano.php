<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ciudadano extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento', 'edad', 'curp', 'direccion', 'trabajos_sociales', 'sexo', 'padre_id', 'madre_id',
        'localidad_id',

    ];

    public function padre(): BelongsTo
    {
        return $this->belongsTo(Ciudadano::class, 'padre_id');
    }

    public function madre(): BelongsTo
    {
        return $this->belongsTo(Ciudadano::class, 'madre_id');
    }

    public function hijos(): HasMany
    {
        return $this->hasMany(Ciudadano::class, 'padre_id')
            ->orHas('madre', function ($query) {
                $query->where('padre_id', $this->id);
            });
    }

    public function localidad(): BelongsTo
    {
        return $this->belongsTo(Localidad::class);
    }

    public function programasSociales(): BelongsToMany
    {
        return $this->belongsToMany(ProgramaSocial::class, 'ciudadano_programa_social');
    }
}
