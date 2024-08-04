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
        'localidad_id', 'telefonos', 'redes_sociales'

    ];

    public function setTelefonosAttribute($value)
    {
        $this->attributes['telefonos'] = is_array($value) ? json_encode($value) : $value;
    }

    public function setRedesSocialesAttribute($value)
    {
        $this->attributes['redes_sociales'] = is_array($value) ? json_encode($value) : $value;
    }

    public function getTelefonosAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getRedesSocialesAttribute($value)
    {
        return json_decode($value, true);
    }

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
        if ($this->sexo == 'F') {
            return $this->hasMany(Ciudadano::class, 'madre_id');
        } else {
            return $this->hasMany(Ciudadano::class, 'padre_id');
        }
    }

    public function localidad(): BelongsTo
    {
        return $this->belongsTo(Localidad::class);
    }

    public function programasSociales(): BelongsToMany
    {
        return $this->belongsToMany(ProgramaSocial::class, 'ciudadano_programa_social');
    }

    public function partidosPoliticos(): BelongsToMany
    {
        return $this->belongsToMany(PartidoPolitico::class, 'ciudadano_partidos_politicos');
    }
}
