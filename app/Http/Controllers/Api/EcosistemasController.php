<?php

namespace App\Http\Controllers\Api;

use App\Models\Ecosistema;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EcosistemasController extends Controller
{
    public function index()
    {
        $ecosistemas = Ecosistema::with('continente')
                        ->where('isActive', 1)
                        ->get();

        if ($ecosistemas->isNotEmpty()) {
            $list = [];
            foreach ($ecosistemas as $ecosistema) {
                $object = [
                    'id' => $ecosistema->id,
                    'nombre' => $ecosistema->nombre,
                    'clima' => $ecosistema->clima,
                    'distribucion' => $ecosistema->distribucion,
                    'altitud' => $ecosistema->altitud,
                    'continente' => $ecosistema->continente ? [
                        'id' => $ecosistema->continente->id,
                        'nombre' => $ecosistema->continente->nombre
                    ] : null,
                    'isActive' => $ecosistema->isActive
                ];
                array_push($list, $object);
            }
            
            return response()->json($list);
        }
        
        return response()->json(['error' => 'No hay ecosistemas activos'], 404);
    }

    public function item($id)
    {
        $ecosistema = Ecosistema::with('continente')
                        ->where('id', $id)
                        ->where('isActive', 1)
                        ->first();

        if ($ecosistema) {
            $object = [
                'id' => $ecosistema->id,
                'nombre' => $ecosistema->nombre,
                'clima' => $ecosistema->clima,
                'distribucion' => $ecosistema->distribucion,
                'altitud' => $ecosistema->altitud,
                'continente' => $ecosistema->continente ? [
                    'id' => $ecosistema->continente->id,
                    'nombre' => $ecosistema->continente->nombre
                ] : null,
                'isActive' => $ecosistema->isActive
            ];

            return response()->json($object);
        }

        return response()->json(['error' => 'Ecosistema no encontrado o inactivo'], 404);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'clima' => 'required|string|max:50',
            'distribucion' => 'required|string|max:100',
            'altitud' => 'required|integer|min:0',
            'continente_id' => 'required|integer|exists:continentes,id',
            'isActive' => 'sometimes|boolean'
        ]);

        try {
            $ecosistema = Ecosistema::create([
                'nombre' => $data['nombre'],
                'clima' => $data['clima'],
                'distribucion' => $data['distribucion'],
                'altitud' => $data['altitud'],
                'continente_id' => $data['continente_id'],
                'isActive' => $data['isActive'] ?? 1
            ]);

            return response()->json([
                'message' => 'Ecosistema creado exitosamente',
                'data' => $ecosistema
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error al crear ecosistema: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear el ecosistema'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|string|max:100',
            'clima' => 'sometimes|string|max:50',
            'distribucion' => 'sometimes|string|max:100',
            'altitud' => 'sometimes|integer|min:0',
            'continente_id' => 'sometimes|integer|exists:continentes,id',
            'isActive' => 'sometimes|boolean'
        ]);

        $ecosistema = Ecosistema::where('id', $id)
                        ->where('isActive', 1)
                        ->first();

        if (!$ecosistema) {
            return response()->json(['error' => 'Ecosistema no encontrado o inactivo'], 404);
        }

        $ecosistema->update($data);

        return response()->json([
            'message' => 'Ecosistema actualizado exitosamente',
            'data' => $ecosistema
        ]);
    }

    public function destroy($id)
    {
        $ecosistema = Ecosistema::where('id', $id)
                        ->where('isActive', 1)
                        ->first();

        if (!$ecosistema) {
            return response()->json(['error' => 'Ecosistema no encontrado o ya inactivo'], 404);
        }

        $ecosistema->update(['isActive' => 0]);

        return response()->json([
            'message' => 'Ecosistema marcado como inactivo exitosamente',
            'data' => $ecosistema
        ]);
    }
}