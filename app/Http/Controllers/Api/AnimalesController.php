<?php

namespace App\Http\Controllers\Api;

use App\Models\Animales;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnimalesController extends Controller
{
    public function index()
    {
        $animales = Animales::where('isActive',"=", 1)->get();

        if ($animales){
            $list = [];
            foreach ($animales as $animal) {
                $object = [
                'id' => $animal->id,
                'nombre' => $animal->nombre,
                'continente_id'=> $animal->continente?->nombre,
                'dieta' => $animal->dieta,
                'especie' => $animal->especie,
            ];
            array_push($list, $object);

        }
        
        return response()->json($list);
        }
        else return response()->json(['error' => 'No hay animales']);
    }

    public function item($id){
        $animal = Animales::where('id', $id)->where('isActive', 1)->first();

        $object = [
            'id' => $animal->id,
            'nombre' => $animal->nombre,
            'continente_id'=> $animal->continente?->nombre,
            'dieta' => $animal->dieta,
            'especie' => $animal->especie,
        ];

        if ($object) return response()->json($object);
        else return response()->json(['error' => 'No hay animales']);
    }

    public function create(Request $request){
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
        if ($animal) return response()->json(["animal"=>$animal]);
        else return response()->json(['error' => 'Error al agregar el animal']);

    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'dieta' => 'required|string|max:255',
            'continente_id' => 'required|integer',
            'isActive' => 'boolean|default:1',
        ]);
    
        $animal = Animales::find($id);
    
        if (!$animal) {
            return response()->json(['error' => 'Animal no encontrado']);
        }
    
        $animal->update($data);
        if ($animal) return response()->json($animal);
        else return response()->json('animales')->with('error', 'Animal no encontrado.');
    }

    public function destroy($id){
        $animal = Animales::where('id', $id)->where('isActive', 1)->first();

        if (!$animal) return response()->json(['error' => 'No hay animales']);

        $animal->update(['isActive' => 0]);
        $animal->save();

        if ($animal) return response()->json($animal);
        else return response()->json(['error' => 'No se ha podido eliminar']);
    }


}
