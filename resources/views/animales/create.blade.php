@extends('layouts.main')

@section('title', 'Editar Animal')

@section('content')
<div class="mb-3">
    <a href="{{ route('home') }}">Inicio</a> / 
    <a href="{{ route('animales') }}">Animales</a>
</div>



<form action="{{ route('animales.store')}}" method="POST">
    @csrf
    @method('POST')

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre"  required>
    </div>

    <div class="mb-3">
        <label for="especie" class="form-label">Especie:</label>
        <input type="text" class="form-control" name="especie" id="especie"  required>
    </div>

    <div class="mb-3">
        <label for="dieta" class="form-label">Dieta:</label>
        <input type="text" class="form-control" name="dieta" id="dieta"  required>
    </div>

    <div class="mb-3">
        <label for="continente_id" class="form-label">Continente:</label>
       <input class="form-control" type="number" name="continente_id" id="continente_id">
    </div>

    <button type="submit" class="btn btn-primary">CREAR</button>
</form>
@endsection
