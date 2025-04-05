<?php

namespace App\Http\Controllers;

use App\Models\Animales;
use App\Models\Continente;
use Illuminate\Http\Request;

class AnimalesController extends Controller {

    public function index() {
        $animales = Animales::where('isActive', 1)->get(); 
        return view('animales.index', compact('animales')); // Carga la vista en views/animales/index.blade.php
    }
    
    public function create() {
    
    
        return view('animales.create');
    }
    
    public function item($id) {
        $animal = Animales::with('continente')->find($id);
    
        if (!$animal) {
            return redirect()->route('animales')->with('error', 'Animal no encontrado.');
        }
    
        return view('animales.item', compact('animal')); // Carga la vista en views/animales/item.blade.php
    }
    
    public function destroy($id) {
        $animal = Animales::find($id);

        if ($animal) {
            $animal->isActive = 0; 
            $animal->save(); 
            return redirect()->route('animales')->with('success', 'Animal marcado como inactivo correctamente.');
        } else {
            return redirect()->route('animales')->with('error', 'Animal no encontrado.');
        }
    }

    public function edit($id) {
        $animal = Animales::where('id', $id)->where('isActive', 1)->first();
        $continentes = Continente::all(); 
        if (!$animal) {
            return redirect()->route('animales')->with('error', 'Animal no encontrado o está inactivo.');
        }
    
        return view('animales.edit', compact('animal', 'continentes')); 
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'dieta' => 'required|string|max:255',
            'continente_id' => 'required|integer',
            'isActive' => 'required|boolean',
        ]);
    
        $animal = Animales::find($id);
    
        if (!$animal) {
            return redirect()->route('animales')->with('error', 'Animal no encontrado.');
        }
    
        $animal->update($data);
        if ($animal) return redirect()->route('animales')->with('success', 'Animal actualizado correctamente.');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|string',
            'especie' => 'required|string',
            'dieta' => 'required|string',
            'continente_id' => 'required|int',
            'isActive' => 'boolean|default:1',
        ]);

        
        // Crear el continente
        $animal = Animales::create([
            'nombre' => $data['nombre'],
            'especie' => $data['especie'],
            'dieta' => $data['dieta'],
            'continente_id' => $data['continente_id'],
            'isActive' => 1,
            ])->save();
       if ($animal) return redirect()->route('animales')->with('success', 'animal agregado correctamente.');
        else return redirect()->back()->with('error', 'Error al agregar el animal.');
    }
    
    
    
}
