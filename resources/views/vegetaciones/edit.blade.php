@extends('layouts.main')

@section('content')
<h1>Editar Vegetación</h1>

<form action="{{ route('vegetaciones.update', $vegetacion->id) }}" method="POST">
@csrf
@method('PUT')

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $vegetacion->nombre) }}" required>
    </div>
    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <input type="text" class="form-control" id="tipo" name="tipo" value="{{ old('tipo', $vegetacion->tipo) }}" required>
    </div>
    <div class="mb-3">
        <label for="continente_id" class="form-label">ID Continente</label>
        <input type="number" class="form-control" id="continente_id" name="continente_id" value="{{ old('continente_id', $vegetacion->continente_id) }}" required>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="isActive" name="isActive" value="1" {{ $vegetacion->isActive ? 'checked' : '' }}>
        <label class="form-check-label" for="isActive">
            Activo
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
