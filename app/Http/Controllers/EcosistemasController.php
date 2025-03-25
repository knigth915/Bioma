<?php

namespace App\Http\Controllers;

use App\Models\Ecosistema;
use Illuminate\Http\Request;

class EcosistemasController extends Controller {
    
    public function index() {

        $ecosistemas = Ecosistema::all();

        return view('ecosistemas', compact('ecosistemas'));
    }

    public function item($id) {

        $ecosistema = Ecosistema::find($id);
        
        return view('ecosistemas-item', compact('ecosistema'));
    }
}