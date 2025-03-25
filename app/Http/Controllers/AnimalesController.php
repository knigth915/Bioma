<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalesController extends Controller {
    
    public function index() {

        $animales = Animal::all();

        return view('animales', compact('animales'));
    }

    public function item($id) {

        $animales = Animal::find($id);

        return view('animales-item', compact('animal'));
    }
}

