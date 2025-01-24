@extends('layouts.trivia')

@section('title', 'Ortographic - ORT001')

@section('content')
<!-- PANTALLA DE BIENVENIDA -->
<main class="menu">
    <h2>Hola <span id="nombre-jugador">{{ Auth::user()->name }}</span></h2>
    <p>Elige una lección.</p>
    <div class="categorias">
        @foreach ($lecciones as $leccion)
        <a href="{{ route('trivia', ['id_leccion' => $leccion->id_leccion]) }}" class="btn-leccion">
            <div class="categoria">
                <h3>{{ $leccion->tema }}</h3>
            </div>
        </a>
        @endforeach
    </div>
</main>
@endsection