@extends('layouts.main')

@section('top-title', 'Agregar Vegetación')

@section('title')
Agregar Vegetación
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('vegetaciones') }}">Vegetaciones</a></li>
<li class="breadcrumb-item active">Agregar</li>
@endsection

@section('content')
<h1>Agregar Vegetación</h1>

<form action="{{ route('vegetaciones.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="continente_id" class="form-label">Continente:</label>
        <select class="form-select" name="continente_id" id="continente_id" required>
            <option value="">Selecciona un continente</option>
            @foreach ($continentes as $continente)
            <option value="{{ $continente->id }}">{{ $continente->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>
    

    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo:</label>
        <input type="text" class="form-control" name="tipo" id="tipo" required>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="isActive" id="isActive" value="1" checked>
        <label class="form-check-label" for="isActive">
            Activo
        </label>
    </div>

    <button type="submit" class="btn btn-success">Guardar Vegetación</button>
</form>
@endsection
