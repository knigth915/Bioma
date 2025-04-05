@extends('layouts.main')

@section('top-title', 'Continentes')

@section('title')
Continentes
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Continentes</li>
@endsection

@section('content')
    <!-- Botón para agregar un nuevo registro -->
    <div class="mb-3">
    <a href="{{ route('continentes.create') }}" class="btn btn-success">
        <i class="fas fa-plus-circle"></i> Agregar Nuevo Continente
    </a>
</div>

<table class="table table-bordered table-hover">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Hemisferio</th>
            <th>Ecosistema</th>
            <th>Área (km²)</th>
            <th>Estado</th>
            <th>Registrado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($continentes as $continente)
            <tr>
                <td>{{ $continente->id }}</td>
                <td>{{ $continente->nombre }}</td>
                <td>{{ $continente->hemisferio }}</td>
                <td>{{ optional($continente->ecosistema)->nombre ?? 'Sin Asignar' }}</td>
                <td>{{ number_format($continente->area, 0, ',', '.') }}</td>
                <td>
                    @if(!$continente->terminated)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>{{ $continente->created_at->format('d/m/Y H:i') }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('continentes.item', $continente->id) }}" class="btn btn-sm btn-primary" title="Ver">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('continentes.edit', $continente->id) }}" class="btn btn-sm btn-warning" title="Editar">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('continentes.destroy', $continente->id) }}" method="POST" style="display: inline-block;">
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
