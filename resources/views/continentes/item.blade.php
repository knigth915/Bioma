@extends('layouts.main')

@section('top-title', 'Continente')

@section('title')
Continentes - Item
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('continentes') }}">Continentes</a></li>
<li class="breadcrumb-item active">Item</li>
@endsection

@section('content')
<h1>Continente</h1>

<table class="table table-bordered table-hover">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Hemisferio</th>
            <th>Ecosistema</th>
            <th>Área (km²)</th>
            <th>Creado</th>
            <th>Actualizado</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $continente->id }}</td>
            <td>{{ $continente->nombre }}</td>
            <td>{{ $continente->hemisferio }}</td>
            <td>{{ optional($continente->ecosistema)->nombre ?? 'Sin Asignar' }}</td>
            <td>{{ number_format($continente->area, 0, ',', '.') }}</td>
            <td>{{ $continente->created_at->format('d/m/Y H:i') }}</td>
            <td>{{ $continente->updated_at->format('d/m/Y H:i') }}</td>
            <td>
                @if($continente->isActive)
                    <span class="badge bg-success">Activo</span>
                @else
                    <span class="badge bg-danger">Inactivo</span>
                @endif
            </td>
        </tr>
    </tbody>
</table>
@endsection
