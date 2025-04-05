<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animales extends Model
{
    protected $table = 'animales';
    protected $fillable = ['continente_id', 'nombre', 'dieta', 'especie', 'isActive'];

    // Relación con el modelo Continente
    public function continente() {
        return $this->belongsTo(Continente::class, 'continente_id');
    }
}


