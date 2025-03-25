<?php

namespace App\Http\Controllers;

use App\Models\Vegetacion;
use Illuminate\Http\Request;

class VegetacionesController extends Controller {
    
    public function index() {

        $vegetaciones = Vegetacion::all();
        
        return view('vegetaciones', compact('vegetaciones'));
    }

    public function item($id) {
        $vegetacion = Vegetacion::find($id);
        return view('vegetaciones-item', compact('vegetacion'));
    }
}
