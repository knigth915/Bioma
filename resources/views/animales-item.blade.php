@extends('layouts.main')

@section('top-title', 'Fauna')

@section('title')
Animales - Item
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('animales') }}">Animales</a></li>
<li class="breadcrumb-item active">Item</li>
@endsection


@section('content')

{{ $animal }}

@endsection