    @extends('layouts.main')

    @section('top-title', 'Fauna')

    @section('title')
    Animales
    @endsection

    @section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Animal</li>
    @endsection


    @section('content')
    <h1>Toda la Fauna</h1>

    <!-- Botón para agregar un nuevo registro -->
<div class="mb-3">
    <a href="{{ route('animales.create') }}" class="btn btn-success">
        <i class="fas fa-plus-circle"></i> Agregar Nuevo Animal
    </a>
</div>

    <table class="table table-bordered table-hover">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Continente</th>
            <th>Nombre</th>
            <th>Especie</th>
            <th>Dieta</th>
            <th>Estado</th>
            <th>Registrado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($animales as $animal)
            <tr>
                <td>{{ $animal->id }}</td>
                <td>{{ $animal->continente->nombre ?? 'Desconocido' }}</td>
                <td>{{ $animal->nombre }}</td>
                <td>{{ $animal->especie }}</td>
                <td>{{ $animal->dieta }}</td>
                <td>
                    @if($animal->isActive)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>{{ $animal->created_at->format('d/m/Y H:i') }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('animales.item', $animal->id) }}" class="btn btn-sm btn-primary" title="Ver">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('animales.edit', $animal->id) }}" class="btn btn-sm btn-warning" title="Editar">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('animales.destroy', $animal->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE') <!-- Esto asegura que Laravel procese la solicitud como DELETE -->
                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este registro?')">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>



                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection