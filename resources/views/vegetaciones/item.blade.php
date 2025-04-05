@extends('layouts.main')

@section('top-title', 'Vegetacion')

@section('title')
Vegetacion - Item
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('vegetaciones') }}">Vegetaciones</a></li>
<li class="breadcrumb-item active">Item</li>
@endsection

@section('content')
<h1>Ecositema</h1>

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Continente</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Creado</th>
                <th>actualizado</th>
                <th>estado</th>
            </tr>
        </thead>
        <tbody>

                <tr>
                    <td>{{ $vegetacion->id }}</td>
                    <td>{{ $vegetacion->continente_id }}</td>
                    <td>{{ $vegetacion->nombre }}</td>
                    <td>{{ $vegetacion->tipo }}</td>
                    <td>{{ $vegetacion->created_at }}</td>
                    <td>{{ $vegetacion->updated_at }}</td>
                    <td>{{ $vegetacion->isActive }}</td>
                    <td>

                    </td>
                </tr>
        
        </tbody>
        
    </table>

    @endsection