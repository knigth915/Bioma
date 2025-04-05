<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Continente extends Model
{
    protected $table = 'continentes';
    protected $fillable = ['nombre', 'hemisferio', 'ecosistema_id','area'];



    public function ecosistemas() {
        return $this->hasMany(Ecosistema::class); // Ajusta la relación según tu estructura de base de datos
    }
    


    public function ecosistema()
{
    return $this->belongsTo(Ecosistema::class);
}

public function vegetaciones()
{
    return $this->hasMany(Vegetacion::class, 'continente_id', 'id'); // 'id' es la llave primaria en continentes
}


}

