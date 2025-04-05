@extends('layouts.main')

@section('title', 'Animal - Detalle')

@section('content')
<h1>Detalles del Animal</h1>

<div class="mb-3">
    <a href="{{ route('home') }}">Inicio</a> / 
    <a href="{{ route('animales') }}">Animales</a>
</div>

<table class="table table-bordered table-hover">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Continente</th>
            <th>Dieta</th>
            <th>Especie</th>
            <th>Estado</th>
            <th>Creado</th>
            <th>Actualizado</th>
            <th>Imagen</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $animal->id }}</td>
            <td>{{ $animal->nombre }}</td>
            <td>{{ $animal->continente->nombre }}</td>
            <td>{{ $animal->dieta }}</td>
            <td>{{ $animal->especie }}</td>
            <td>{{ $animal->isActive ? 'Activo' : 'Inactivo' }}</td>
            <td>{{ $animal->created_at }}</td>
            <td>{{ $animal->updated_at }}</td>
            <td>
                @if(file_exists(public_path('storage/images/animales' . $animal->id . '.jpg')))
                    <img src="{{ asset('storage/images/animales' . $animal->id . '.jpg') }}" alt="Imagen del animal" style="max-width: 200px;">
                @else
                    <p>No hay imagen disponible</p>
                @endif
            </td>
        </tr>
    </tbody>
</table>
@endsection
