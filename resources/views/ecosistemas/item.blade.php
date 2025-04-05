@extends('layouts.main')

@section('top-title', 'Ecosistema')

@section('title')
Ecosistema - Item
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('ecosistemas') }}">Ecosistemas</a></li>
<li class="breadcrumb-item active">Item</li>
@endsection

@section('content')
<h1>Ecosistema</h1>

<table class="table table-bordered table-hover">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Continente</th>
            <th>Nombre</th>
            <th>Clima</th>
            <th>Distribución</th>
            <th>Altitud</th>
            <th>Creado</th>
            <th>Actualizado</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $ecosistema->id }}</td>
            <td>{{ optional($ecosistema->continente)->nombre ?? 'Sin asignar' }}</td> <!-- Relación con Continente -->
            <td>{{ $ecosistema->nombre }}</td>
            <td>{{ $ecosistema->clima }}</td>
            <td>{{ $ecosistema->distribucion }}</td>
            <td>{{ number_format($ecosistema->altitud, 0, ',', '.') }} m</td>
            <td>{{ $ecosistema->created_at ? $ecosistema->created_at->format('d/m/Y H:i') : 'Sin registrar' }}</td>
            <td>{{ $ecosistema->updated_at ? $ecosistema->updated_at->format('d/m/Y H:i') : 'Sin registrar' }}</td>
            <td>
                @if($ecosistema->isActive)
                    <span class="badge bg-success">Activo</span>
                @else
                    <span class="badge bg-danger">Inactivo</span>
                @endif
            </td>
        </tr>
    </tbody>
</table>
@endsection
