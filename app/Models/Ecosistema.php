<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ecosistema extends Model
{
    protected $fillable = ['clasificacion', 'temperatura_min', 'temperatura_max', 'clima', 'altitud'];
}
