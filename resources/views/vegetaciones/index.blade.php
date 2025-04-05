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
<div class="d-flex justify-content-between mb-3">
    <h1>Lista de Vegetaciones</h1>
</div>

    <!-- Botón para agregar un nuevo registro -->
    <div class="mb-3">
    <a href="{{ route('vegetaciones.create') }}" class="btn btn-success">
        <i class="fas fa-plus-circle"></i> Agregar Nueva Vegetacion
    </a>
    <a href="vegetaciones/create"></a>
</div>

<table class="table table-bordered table-hover">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Continente</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Estado</th>
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
                <td>
                    @if($vegetacion->isActive)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>{{ $vegetacion->created_at->format('d/m/Y H:i') }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('vegetaciones.item', $vegetacion->id) }}" class="btn btn-sm btn-primary" title="Ver">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('vegetaciones.edit', $vegetacion->id) }}" class="btn btn-sm btn-warning" title="Editar">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('vegetaciones.destroy', $vegetacion->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar esta vegetación?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection