@extends('layouts.main')

@section('top-title', 'Ecosistemas')

@section('title')
    Ecosistemas
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Ecosistemas</li>
@endsection

@section('content')
    <h1>Lista de Ecosistemas</h1>

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Continente</th>
                <th>Nombre</th>
                <th>Clima</th>
                <th>Distribución</th>
                <th>Altitud (m)</th>
                <th>Registrado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ecosistemas as $ecosistema)
                <tr>
                    <td>{{ $ecosistema->id }}</td>
                    <td>{{ $ecosistema->continente_id }}</td>
                    <td>{{ $ecosistema->nombre }}</td>
                    <td>{{ $ecosistema->clima }}</td>
                    <td>{{ $ecosistema->distribucion }}</td>
                    <td>{{ number_format($ecosistema->altitud) }}</td>
                    <td>{{ $ecosistema->created_at }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('ecosistemas.item', $ecosistema->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
