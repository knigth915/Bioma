<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['continente_id', 'nombre', 'dieta', 'especie'];
}


