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
<h1>Todos los Continentes</h1>

<table class="table table-bordered table-hover">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Hemisferio</th>
            <th>Ecosistema</th>
            <th>Area</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($continentes as $continente)

            <tr>
                <td>{{ $continente->id }}</td>
                <td>{{ $continente->nombre }}</td>
                <td>{{ $continente->hemisferio }}</td>
                <td>{{ $continente->ecosistema_id }}</td>
                <td>{{ $continente->area }}</td>
                <td>{{ $continente->terminated }}</td>
                <td>{{ $continente->created_at }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('continentes.item', $continente->id) }}">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>

        @endforeach 		
    </tbody>
    
</table>

@endsection