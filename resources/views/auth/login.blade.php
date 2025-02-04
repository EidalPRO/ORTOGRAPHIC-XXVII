@extends('layouts.auth')

@section('content')
<header>
    <div class="logo">
        <img src="{{asset('assets/img/logo-ortographic.webp')}}" alt="Logo de Ortographic">
    </div>
    <h1>Hola, Bienvenido de nuevo!</h1>
    <p>¿No tienes cuenta? <a href="{{route('registro')}}" class="text-white">Registrate gratis</a></p>
</header>
<form action="{{ route('logear') }}" method="post">
    @csrf
    @method('post')
    <input
        type="email"
        name="email"
        placeholder="Correo Electronico"
        required>

    <input
        type="password"
        name="password"
        placeholder="Contraseña"
        minlength="8"
        required>
    <p>La contraseña debe tener minimo 8 caracteres</p>

    <button type="submit">Iniciar sesion</button>

    <div class="or">o</div>
    <button class="sso" type="button" onclick="google()"><i class="bi bi-google"></i> Inicia con google</button>
    <!-- <button class="sso" type="button" onclick="facebook()"><i class="bi bi-facebook"></i> Inicia con facebook</button> -->
    <p>
        Al iniciar sesion usted esta aceptando <a>Los terminos del servicio</a> y la<a>Politica de privacidad</a>.
    </p>

    <script>
        function facebook() {
            window.location.href = "{{ route('facebook.redirect') }}";
        }

        function google() {
            window.location.href = "{{ route('google.redirect') }}";
        }
    </script>
</form>
@endsection