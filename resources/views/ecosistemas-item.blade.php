@extends('layouts.main')

@section('top-title', 'Ecosistemas')

@section('title')
Ecosistemas - Item
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('ecosistemas') }}">Ecosistemas</a></li>
<li class="breadcrumb-item active">Item</li>
@endsection


@section('content')

{{ $ecosistema }}

@endsection