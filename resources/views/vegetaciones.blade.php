@extends('layouts.main')

@section('top-title', 'Vegetaciones')

@section('title')
    Vegetaciones
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Vegetaciones</li>
@endsection

@section('content')
    <h1>Lista de Vegetaciones</h1>

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Continente</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Registrado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vegetaciones as $vegetacion)
                <tr>
                    <td>{{ $vegetacion->id }}</td>
                    <td>{{ $vegetacion->continente_id }}</td>
                    <td>{{ $vegetacion->nombre }}</td>
                    <td>{{ $vegetacion->tipo }}</td>
                    <td>{{ $vegetacion->created_at }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('vegetaciones.item', $vegetacion->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection