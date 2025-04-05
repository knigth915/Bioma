@extends('layouts.main')

@section('title', 'Editar Ecosistema')

@section('content')
<h1>Editar Ecosistema</h1>

<form action="{{ route('ecosistemas.update', $ecosistema->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $ecosistema->nombre }}" required>
    </div>
    <div class="mb-3">
        <label for="clima" class="form-label">Clima</label>
        <input type="text" class="form-control" id="clima" name="clima" value="{{ $ecosistema->clima }}" required>
    </div>
    <div class="mb-3">
        <label for="distribucion" class="form-label">Distribución</label>
        <input type="text" class="form-control" id="distribucion" name="distribucion" value="{{ $ecosistema->distribucion }}" required>
    </div>
    <div class="mb-3">
        <label for="altitud" class="form-label">Altitud (m)</label>
        <input type="number" class="form-control" id="altitud" name="altitud" value="{{ $ecosistema->altitud }}" required>
    </div>
    <div class="mb-3">
        <label for="continente_id" class="form-label">Continente</label>
        <select name="continente_id" id="continente_id" class="form-control">
            @foreach ($continentes as $continente)
                <option value="{{ encrypt($continente->id) }}" 
                    {{ $ecosistema->continente_id == $continente->id ? 'selected' : '' }}>
                    {{ $continente->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="isActive" name="isActive" value="1" 
            {{ $ecosistema->isActive ? 'checked' : '' }}>
        <label class="form-check-label" for="isActive">Activo</label>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>
@endsection
