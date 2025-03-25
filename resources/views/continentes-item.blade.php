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

{{ $continente }}

@endsection