@extends('layouts.main')

@section('content')
<h1 class="mb-4">Agregar Continente</h1>

<form action="{{ route('continentes.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="hemisferio" class="form-label">Hemisferio:</label>
        <input type="text" name="hemisferio" id="hemisferio" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="area" class="form-label">Área:</label>
        <input type="number" name="area" id="area" class="form-control" required min="0">
    </div>

    <div class="mb-3">
        <label for="ecosistema_id" class="form-label">Ecosistema:</label>
        <select name="ecosistema_id" id="ecosistema_id" class="form-select" required>
            @foreach ($ecosistemas as $ecosistema)
                <option value="{{ encrypt($ecosistema->id) }}">{{ $ecosistema->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="isActive" id="isActive" value="1" checked>
        <label class="form-check-label" for="isActive">
            Activo
        </label>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
