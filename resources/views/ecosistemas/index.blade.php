@extends('layouts.main')

@section('top-title', 'Ecosistemas')

@section('title', 'Ecosistemas')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Ecosistemas</li>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lista de Ecosistemas</h1>
    <a href="{{ route('ecosistemas.create') }}" class="btn btn-success">
        <i class="fas fa-plus-circle"></i> Agregar Nuevo Ecosistema
    </a>
</div>

<table class="table table-bordered table-hover">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Continente</th>
            <th>Nombre</th>
            <th>Clima</th>
            <th>Distribución</th>
            <th>Altitud (m)</th>
            <th>Estado</th>
            <th>Registrado</th>
            <th>Actualizado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ecosistemas as $ecosistema)
            <tr>
                <td>{{ $ecosistema->id }}</td>
                <td>{{ $ecosistema->continente->nombre ?? 'Sin asignar' }}</td>
                <td>{{ $ecosistema->nombre }}</td>
                <td>{{ $ecosistema->clima }}</td>
                <td>{{ $ecosistema->distribucion }}</td>
                <td>{{ number_format($ecosistema->altitud, 0, ',', '.') }} m</td>
                <td>
                    @if($ecosistema->isActive)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>{{ $ecosistema->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $ecosistema->updated_at->format('d/m/Y H:i') }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('ecosistemas.item', $ecosistema->id) }}" class="btn btn-sm btn-primary" title="Ver">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('ecosistemas.edit', $ecosistema->id) }}" class="btn btn-sm btn-warning" title="Editar">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('ecosistemas.destroy', $ecosistema->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este continente?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection