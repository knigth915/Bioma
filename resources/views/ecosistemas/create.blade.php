@extends('layouts.main')

@section('content')
<h1 class="mb-4">Agregar Ecosistema</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('ecosistemas.store') }}" method="POST">
    @csrf
    @method("POST")
    <div class="mb-3">
        <label for="">Continente:</label>
        <input type="number" name="continente_id" id="continente_id" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
    </div>

    <div class="mb-3">
        <label for="clima" class="form-label">Clima:</label>
        <input type="text" class="form-control" id="clima" name="clima" value="{{ old('clima') }}" required>
    </div>

    <div class="mb-3">
        <label for="distribucion" class="form-label">Distribución:</label>
        <input type="text" class="form-control" id="distribucion" name="distribucion" value="{{ old('distribucion') }}" required>
    </div>

    <div class="mb-3">
        <label for="altitud" class="form-label">Altitud:</label>
        <input type="number" class="form-control" id="altitud" name="altitud" min="0" value="{{ old('altitud') }}" required>
    </div>



    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
