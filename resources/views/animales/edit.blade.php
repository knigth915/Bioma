@extends('layouts.main')

@section('title', 'Editar Animal')

@section('content')
<div class="mb-3">
    <a href="{{ route('home') }}">Inicio</a> / 
    <a href="{{ route('animales') }}">Animales</a>
</div>

<h1>Editar Animal: {{ $animal->nombre }}</h1>

<form action="{{ route('animales.update', $animal->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $animal->nombre }}" required>
    </div>

    <div class="mb-3">
        <label for="especie" class="form-label">Especie:</label>
        <input type="text" class="form-control" name="especie" id="especie" value="{{ $animal->especie }}" required>
    </div>

    <div class="mb-3">
        <label for="dieta" class="form-label">Dieta:</label>
        <input type="text" class="form-control" name="dieta" id="dieta" value="{{ $animal->dieta }}" required>
    </div>

    <div class="mb-3">
        <label for="continente_id" class="form-label">Continente:</label>
        <select class="form-select" name="continente_id" id="continente_id" required>
            @foreach ($continentes as $continente)
            <option value="{{ $continente->id }}" {{ $animal->continente_id == $continente->id ? 'selected' : '' }}>
                {{ $continente->nombre }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="isActive" class="form-label">Activo:</label>
        <select class="form-select" name="isActive" id="isActive" required>
            <option value="1" {{ $animal->isActive == 1 ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ $animal->isActive == 0 ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
