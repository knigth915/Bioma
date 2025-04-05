<?php

namespace App\Http\Controllers;

use App\Models\Ecosistema;
use App\Models\Continente;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class EcosistemasController extends Controller {
    // Mostrar todos los ecosistemas activos
    public function index() {
        $ecosistemas = Ecosistema::with('continente')->where('isActive', 1)->get();
        return view('ecosistemas.index', compact('ecosistemas'));
    }

    // Mostrar un ecosistema específico
    public function item($id) {
        $ecosistema = Ecosistema::with('continente')->find($id);

        if (!$ecosistema) {
            return redirect()->route('ecosistemas')->with('error', 'Ecosistema no encontrado.');
        }

        return view('ecosistemas.item', compact('ecosistema'));
    }

    // Marcar un ecosistema como inactivo
    public function destroy($id) {
        $ecosistema = Ecosistema::find($id);

        if (!$ecosistema) {
            return redirect()->route('ecosistemas')->with('error', 'Ecosistema no encontrado.');
        }

        $ecosistema->isActive = 0;
        $ecosistema->save();

        return redirect()->route('ecosistemas')->with('success', 'Ecosistema marcado como inactivo correctamente.');
    }

    // Editar un ecosistema existente
    public function edit($id) {
        $ecosistema = Ecosistema::with('continente')->find($id);
        $continentes = Continente::where('isActive', 1)->get(['id', 'nombre']);

        if (!$ecosistema) {
            return redirect()->route('ecosistemas')->with('error', 'Ecosistema no encontrado.');
        }

        return view('ecosistemas.edit', compact('ecosistema', 'continentes'));
    }

    // Actualizar un ecosistema existente
    public function update(Request $request, $id) {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'clima' => 'required|string|max:50',
            'distribucion' => 'required|string|max:100',
            'altitud' => 'required|integer|min:0',
            'continente_id' => 'required',
            'isActive' => 'required|boolean',
        ]);

        try {
            $data['continente_id'] = decrypt($data['continente_id']);
            Log::info('continente_id desencriptado:', ['continente_id' => $data['continente_id']]);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            Log::error('Error al desencriptar continente_id:', ['error' => $e->getMessage()]);
            return redirect()->route('ecosistemas.edit', $id)->with('error', 'ID del continente no válido.');
        }

        $ecosistema = Ecosistema::find($id);

        if (!$ecosistema) {
            return redirect()->route('ecosistemas')->with('error', 'Ecosistema no encontrado.');
        }

        $ecosistema->update($data);

        return redirect()->route('ecosistemas', ['id' => $ecosistema->id])->with('success', 'Ecosistema actualizado correctamente.');
    }

    public function create() {
        $continentes = Continente::where('isActive', 1)->get();
        if ($continentes->isEmpty()) {
            return redirect()->route('ecosistemas')->with('error', 'No se pudieron cargar los continentes.');
        }
    
        return view('ecosistemas.create', compact('continentes'));
    }
    

    // Guardar un nuevo ecosistema
    public function store(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'clima' => 'required|string|max:50',
            'distribucion' => 'required|string|max:100',
            'altitud' => 'required|integer|min:0',
            'continente_id' => 'required|integer',
            'isActive' => 'boolean|default:1',
        ]);

            $ecosistema = Ecosistema::create(
                [
                    'nombre' => $data['nombre'],
                    'clima' => $data['clima'],
                    'distribucion' => $data['distribucion'],
                    'altitud' => $data['altitud'],
                    'continente_id' => $data['continente_id'],
                    'isActive' => 1,
                ]
            )->save();

            if ($ecosistema)  return redirect()->route('ecosistemas')->with('success', 'Ecosistema agregado correctamente.');
            else return redirect()->back()->with('error', 'Error al guardar: ' . $e->getMessage());
    }
    
}
