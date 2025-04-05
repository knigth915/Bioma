<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vegetacion extends Model
{
    protected $table = 'vegetaciones';
    protected $fillable = ['continente_id','nombre', 'tipo','isActive'];


public function continente() {

    return $this->belongsTo(Continente::class, 'continente_id', 'id'); // 'continente_id' es la llave foránea en la tabla vegetaciones

}
}
