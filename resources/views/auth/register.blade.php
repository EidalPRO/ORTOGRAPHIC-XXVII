@extends('layouts.auth')

@section('content')
<header>
    <div class="logo">
        <img src="{{asset('assets/img/logo-ortographic.webp')}}" alt="Logo de Ortographic">
    </div>
    <h1>Hola, Bienvenido a Ortographic!</h1>
    <p>¿Ya tienes cuenta? <a href="{{route('login')}}" class="text-white">Inicia sesión</a></p>
</header>
<form action="{{ route('registrar') }}" method="post">
    @csrf
    @method('POST')
    <input type="text"
        name="name"
        placeholder="Nombre de usuario"
        required>

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

    <select name="rol" required>
        <option value="" disabled selected>Tipo de usuario</option>
        <option value="alumno">Alumno</option>
        <option value="docente">Docente</option>
    </select>

    <button type="submit">Registrarse</button>

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