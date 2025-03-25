@extends('layouts.main')

@section('top-title', 'Vegetacion')

@section('title')
Vegetacion - Item
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('vegetaciones') }}">Vegetacion</a></li>
<li class="breadcrumb-item active">Item</li>
@endsection


@section('content')

{{ $vegetacion }}

@endsection