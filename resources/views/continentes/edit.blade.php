@extends('layouts.main')

@section('content')
<h1>Editar Continente</h1>

<form action="{{ route('continentes.update', $continente->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $continente->nombre) }}" required>
    </div>

    <div class="mb-3">
        <label for="hemisferio" class="form-label">Hemisferio</label>
        <input type="text" class="form-control" id="hemisferio" name="hemisferio" value="{{ old('hemisferio', $continente->hemisferio) }}" required>
    </div>

    <div class="mb-3">
        <label for="ecosistema_id" class="form-label">Ecosistema</label>
        <select class="form-select" id="ecosistema_id" name="ecosistema_id" required>
            @foreach($ecosistemas as $ecosistema)
                <option value="{{ $ecosistema->id }}" {{ $continente->ecosistema_id == $ecosistema->id ? 'selected' : '' }}>
                    {{ $ecosistema->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="area" class="form-label">Área</label>
        <input type="number" class="form-control" id="area" name="area" step="0.01" value="{{ old('area', $continente->area) }}" required>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="isActive" name="isActive" value="1" {{ $continente->isActive ? 'checked' : '' }}>
        <label class="form-check-label" for="isActive">
            Activo
        </label>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
