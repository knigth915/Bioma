<?php

namespace App\Http\Controllers;

use App\Models\Vegetacion;
use App\Models\Continente;
use Illuminate\Http\Request;

class VegetacionesController extends Controller 
{
    // Mostrar vegetaciones activas
    public function index() 
    {
        $vegetaciones = Vegetacion::join('continentes', 'vegetaciones.continente_id', '=', 'continentes.id')
                                  ->select('vegetaciones.*', 'continentes.nombre as continente_nombre')
                                  ->where('vegetaciones.isActive', 1)
                                  ->get();

        return view('vegetaciones.index', compact('vegetaciones'));
    }

    // Mostrar detalles de una vegetación
    public function item($id) 
    {
        $vegetacion = Vegetacion::join('continentes', 'vegetaciones.continente_id', '=', 'continentes.id')
                                ->select('vegetaciones.*', 'continentes.nombre as continente_nombre')
                                ->where('vegetaciones.id', $id)
                                ->firstOrFail();

        return view('vegetaciones.item', compact('vegetacion'));
    }

    // Formulario para agregar una nueva vegetación
    public function create() 
    {
        $continentes = Continente::all(); // Cargar todos los continentes
        return view('vegetaciones.create', compact('continentes'));
    }

    // Guardar una nueva vegetación
    public function store(Request $request) 
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'tipo' => 'required|string|max:50',
            'continente_id' => 'required|exists:continentes,id',
        ]);

        Vegetacion::create($request->all());

        return redirect()->route('vegetaciones')->with('success', 'Vegetación registrada correctamente.');
    }

    // Formulario para editar una vegetación existente
    public function edit($id) 
    {
        $vegetacion = Vegetacion::findOrFail($id);
        $continentes = Continente::all(); // Cargar todos los continentes
        return view('vegetaciones.edit', compact('vegetacion', 'continentes'));
    }

    // Actualizar datos de una vegetación existente
    public function update(Request $request, $id) 
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'continente_id' => 'required|exists:continentes,id',
            'isActive' => 'required|boolean',
        ]);

        $vegetacion = Vegetacion::findOrFail($id);
        $vegetacion->update($request->all());

        return redirect()->route('vegetaciones')->with('success', 'Vegetación actualizada correctamente.');
    }

    // Marcar una vegetación como inactiva
    public function destroy($id) 
    {
        $vegetacion = Vegetacion::findOrFail($id);
        $vegetacion->update(['isActive' => 0]);

        return redirect()->route('vegetaciones')->with('success', 'Vegetación marcada como inactiva.');
    }
}
