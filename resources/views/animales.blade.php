    @extends('layouts.main')

    @section('top-title', 'Fuana')

    @section('title')
    Fauna
    @endsection

    @section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Fuana</li>
    @endsection


    @section('content')
    <h1>Todos la Fauna</h1>

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Continente</th>
                <th>Nombre</th>
                <th>Dieta</th>
                <th>Registrado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animales as $animal)

                <tr>
                    <td>{{ $animal->id }}</td>
                    <td>{{ $animal->continente_id }}</td>
                    <td>{{ $animal->nombre }}</td>
                    <td>{{ $animal->dieta }}</td>
                    <td>{{ $animal->terminated }}</td>
                    <td>{{ $animal->created_at }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('animales.item', $animal->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>

            @endforeach 		
        </tbody>
        
    </table>

    @endsection