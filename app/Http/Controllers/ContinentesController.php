<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Continente;
use App\Models\Ecosistema;
use Illuminate\Http\Request;

class ContinentesController extends Controller {
    public function index() {
        $continentes = Continente::where('isActive', 1)
            ->with('ecosistemas') // Relación existente
            ->get();
    
        return view('continentes.index', compact('continentes'));
    }
    
    public function item($id) {
        $continente = Continente::with('ecosistemas')->find($id);
    
        if (!$continente) {
            return redirect()->route('continentes')->with('error', 'Continente no encontrado.');
        }
    
        return view('continentes.item', compact('continente')); 
    }
    

    public function destroy($id) {
        $continente = Continente::find($id);
    
        if (!$continente) {
            abort(404, 'Continente no encontrado.');
        }

        $continente->isActive = 0;
        $continente->save();
    
        return redirect()->route('continentes')->with('success', 'Continente marcado como inactivo correctamente.');
    }

    public function edit($id) {
        $continente = Continente::where('id', $id)->where('isActive', 1)->first();
        $ecosistemas = Ecosistema::all(); 
    
        if (!$continente) {
            return redirect()->route('continentes')->with('error', 'Continente no encontrado o está inactivo.');
        }
    
        return view('continentes.edit', compact('continente', 'ecosistemas')); 
    }

    public function update(Request $request, $id) {
        
        $continente = Continente::find($id);
        
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'hemisferio' => 'required|string|max:50',
            'ecosistema_id' => 'required|integer',
            'area' => 'required|numeric|min:0',
            'isActive' => 'required|boolean',
        ]);


        if (!$continente) {
            return redirect()->route('continentes')->with('error', 'Continente no encontrado.');
        }

        $continente->update($data);

        return redirect()->route('continentes', ['id' => $continente->id])->with('success', 'Continente actualizado correctamente.');
    }

    public function create() {
        $ecosistemas = Ecosistema::all();
    
        if ($ecosistemas->isEmpty()) {
            return redirect()->route('continentes')->with('error', 'No se pudieron cargar los ecosistemas.');
        }
    
        return view('continentes.create', compact('ecosistemas')); 
    }

    public function store(Request $request) {
        // Registrar los datos entrantes para depuración
        Log::info('Datos recibidos:', $request->all());
        
        // Validar los datos del formulario
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'clima' => 'required|string|max:50',
            'distribucion' => 'required|string|max:100',
            'altitud' => 'required|numeric|min:0',
            'continente_id' => 'required', // No se utiliza integer porque está encriptado
            'isActive' => 'boolean',
        ]);
    
        try {
            // Desencriptar el ID del continente
            $data['continente_id'] = decrypt($data['continente_id']);
            Log::info('Continente ID desencriptado:', ['continente_id' => $data['continente_id']]);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            Log::error('Error al desencriptar continente_id:', ['error' => $e->getMessage()]);
            return redirect()->route('ecosistemas.create')->with('error', 'ID del continente no válido.');
        }
    
        try {
            // Crear el ecosistema en la base de datos
            $ecosistema = Ecosistema::create([
                'nombre' => $data['nombre'],
                'clima' => $data['clima'],
                'distribucion' => $data['distribucion'],
                'altitud' => $data['altitud'],
                'continente_id' => $data['continente_id'],
                'isActive' => $data['isActive'] ?? 1, // Por defecto, activado si no se especifica
            ]);
    
            Log::info('Ecosistema creado correctamente:', ['ecosistema_id' => $ecosistema->id]);
        } catch (\Exception $e) {
            Log::error('Error al guardar el ecosistema:', ['error' => $e->getMessage()]);
            return redirect()->route('ecosistemas.create')->with('error', 'No se pudo guardar el ecosistema.');
        }
    
        // Redirigir correctamente a la vista de índice
        return redirect()->route('ecosistemas')->with('success', 'Ecosistema agregado correctamente.');
    }
    
}
