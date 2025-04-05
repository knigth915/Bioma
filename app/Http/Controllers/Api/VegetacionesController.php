<?php

namespace App\Http\Controllers\Api;

use App\Models\Vegetacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VegetacionesController extends Controller
{
    public function index()
    {
        $vegetaciones = Vegetacion::with('continente')
                        ->where('isActive', 1)
                        ->get();

        if ($vegetaciones->isNotEmpty()) {
            $formattedVegetaciones = $vegetaciones->map(function($vegetacion) {
                return [
                    'id' => $vegetacion->id,
                    'nombre' => $vegetacion->nombre,
                    'tipo' => $vegetacion->tipo,
                    'continente' => $vegetacion->continente ? [
                        'id' => $vegetacion->continente->id,
                        'nombre' => $vegetacion->continente->nombre
                    ] : null,
                    'isActive' => $vegetacion->isActive,
                    'created_at' => $vegetacion->created_at,
                    'updated_at' => $vegetacion->updated_at
                ];
            });
            
            return response()->json($formattedVegetaciones);
        }
        
        return response()->json(['error' => 'No hay vegetaciones activas'], 404);
    }

    public function item($id)
    {
        $vegetacion = Vegetacion::with('continente')
                        ->where('id', $id)
                        ->where('isActive', 1)
                        ->first();

        if ($vegetacion) {
            $formattedVegetacion = [
                'id' => $vegetacion->id,
                'nombre' => $vegetacion->nombre,
                'tipo' => $vegetacion->tipo,
                'continente' => $vegetacion->continente ? [
                    'id' => $vegetacion->continente->id,
                    'nombre' => $vegetacion->continente->nombre
                ] : null,
                'isActive' => $vegetacion->isActive,
                'created_at' => $vegetacion->created_at,
                'updated_at' => $vegetacion->updated_at
            ];

            return response()->json($formattedVegetacion);
        }

        return response()->json(['error' => 'Vegetación no encontrada o inactiva'], 404);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:50',
            'tipo' => 'required|string|max:50',
            'continente_id' => 'required|integer|exists:continentes,id',
            'isActive' => 'sometimes|boolean'
        ]);

        try {
            $vegetacion = Vegetacion::create([
                'nombre' => $data['nombre'],
                'tipo' => $data['tipo'],
                'continente_id' => $data['continente_id'],
                'isActive' => $data['isActive'] ?? 1
            ]);

            return response()->json([
                'message' => 'Vegetación creada exitosamente',
                'data' => $vegetacion
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error al crear vegetación: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear la vegetación'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|string|max:50',
            'tipo' => 'sometimes|string|max:50',
            'continente_id' => 'sometimes|integer|exists:continentes,id',
            'isActive' => 'sometimes|boolean'
        ]);

        $vegetacion = Vegetacion::where('id', $id)
                        ->where('isActive', 1)
                        ->first();

        if (!$vegetacion) {
            return response()->json(['error' => 'Vegetación no encontrada o inactiva'], 404);
        }

        $vegetacion->update($data);

        return response()->json([
            'message' => 'Vegetación actualizada exitosamente',
            'data' => $vegetacion
        ]);
    }

    public function destroy($id)
    {
        $vegetacion = Vegetacion::where('id', $id)
                        ->where('isActive', 1)
                        ->first();

        if (!$vegetacion) {
            return response()->json(['error' => 'Vegetación no encontrada o ya inactiva'], 404);
        }

        $vegetacion->update(['isActive' => 0]);

        return response()->json([
            'message' => 'Vegetación marcada como inactiva exitosamente',
            'data' => $vegetacion
        ]);
    }
}
