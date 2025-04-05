<?php

namespace App\Http\Controllers\Api;

use App\Models\Continente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContinentesController extends Controller
{
    public function index()
    {
        $continentes = Continente::where('isActive', 1)->with('ecosistemas')->get();

        if ($continentes->isNotEmpty()) {
            $list = [];
            foreach ($continentes as $continente) {
                $object = [
                    'id' => $continente->id,
                    'nombre' => $continente->nombre,
                    'hemisferio' => $continente->hemisferio,
                    'area' => $continente->area,
                    'ecosistemas' => $continente->ecosistemas->map(function($ecosistema) {
                        return [
                            'id' => $ecosistema->id,
                            'nombre' => $ecosistema->nombre
                        ];
                    }),
                    'isActive' => $continente->isActive
                ];
                array_push($list, $object);
            }
            
            return response()->json($list);
        }
        
        return response()->json(['error' => 'No hay continentes activos'], 404);
    }

    public function item($id)
    {
        $continente = Continente::where('id', $id)
                        ->where('isActive', 1)
                        ->with('ecosistemas')
                        ->first();

        if ($continente) {
            $object = [
                'id' => $continente->id,
                'nombre' => $continente->nombre,
                'hemisferio' => $continente->hemisferio,
                'area' => $continente->area,
                'ecosistemas' => $continente->ecosistemas->map(function($ecosistema) {
                    return [
                        'id' => $ecosistema->id,
                        'nombre' => $ecosistema->nombre
                    ];
                }),
                'isActive' => $continente->isActive
            ];

            return response()->json($object);
        }

        return response()->json(['error' => 'Continente no encontrado o inactivo'], 404);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'hemisferio' => 'required|string|max:50',
            'area' => 'required|numeric|min:0',
            'isActive' => 'boolean'
        ]);

        $continente = Continente::create([
            'nombre' => $data['nombre'],
            'hemisferio' => $data['hemisferio'],
            'area' => $data['area'],
            'isActive' => $data['isActive'] ?? 1
        ]);

        if ($continente) {
            return response()->json([
                'message' => 'Continente creado exitosamente',
                'data' => $continente
            ], 201);
        }

        return response()->json(['error' => 'Error al crear el continente'], 500);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|string|max:100',
            'hemisferio' => 'sometimes|string|max:50',
            'area' => 'sometimes|numeric|min:0',
            'isActive' => 'sometimes|boolean'
        ]);

        $continente = Continente::where('id', $id)
                        ->where('isActive', 1)
                        ->first();

        if (!$continente) {
            return response()->json(['error' => 'Continente no encontrado o inactivo'], 404);
        }

        $continente->update($data);

        return response()->json([
            'message' => 'Continente actualizado exitosamente',
            'data' => $continente
        ]);
    }

    public function destroy($id)
    {
        $continente = Continente::where('id', $id)
                        ->where('isActive', 1)
                        ->first();

        if (!$continente) {
            return response()->json(['error' => 'Continente no encontrado o ya inactivo'], 404);
        }

        $continente->update(['isActive' => 0]);

        return response()->json([
            'message' => 'Continente marcado como inactivo exitosamente',
            'data' => $continente
        ]);
    }
}