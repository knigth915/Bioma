<?php

namespace App\Http\Controllers;

use App\Models\Continente;
use Illuminate\Http\Request;

class ContinentesController extends Controller {
    
    public function index() {

        $continentes = Continente::all();

        return view('continentes', compact('continentes'));
    }

    public function item($id) {

        $continentes = Continente::find($id);

        return view('continentes-item', compact('continente'));
    }
}