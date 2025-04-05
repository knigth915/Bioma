<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ecosistema extends Model
{
    protected $table = 'ecosistemas';
    protected $fillable = ['continente_id',"nombre","clima","distribucion","altitud","isActive"];


    public function continente() {
        return $this->belongsTo(Continente::class);
    }
    

}