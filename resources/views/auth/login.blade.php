@extends('layouts.auth')

@section('content')
<div class="box">
    <div class="inner-box">
        <div class="forms-wrap">
            <form action="{{ route('logear') }}" method="post" autocomplete="off" class="sign-in-form">
                @csrf
                @method('post')
                <div class="logo">
                    <img src="{{asset('assets/img/logo-ortographic.webp')}}" alt="easyclass" />
                    <h4>Ortographic</h4>
                </div>

                <div class="heading">
                    <h2>Hola, Bienvenido de nuevo!</h2>
                    <h6>¿No tienes cuenta?</h6>
                    <a href="#" class="toggle">Registrate gratis</a>
                </div>

                <div class="actual-form">
                    <div class="input-wrap">
                        <input
                            type="email"
                            name="email"
                            class="input-field"
                            required>
                        <label>Correo electronico</label>
                    </div>

                    <div class="input-wrap">
                        <input
                            type="password"
                            name="password"
                            minlength="8"
                            class="input-field"
                            required>
                        <label>Contraseña</label>
                    </div>

                    <input type="submit" value="Iniciar sesion" class="sign-btn" />

                    <!-- <p class="text">
                        Al iniciar sesion usted esta aceptando <a>Los terminos del servicio</a> y la<a>Politica de privacidad</a>.
                    </p> -->
                </div>
                <div class="or">o tambien puedes</div>
                <button class="sso" type="button" onclick="google()"><i class="bi bi-google"></i> Inicia con google</button>
                <!-- <button class="sso" type="button" onclick="facebook()"><i class="bi bi-facebook"></i> Inicia con facebook</button> -->

                <script>
                    function facebook() {
                        window.location.href = "{{ route('facebook.redirect') }}";
                    }

                    function google() {
                        window.location.href = "{{ route('google.redirect') }}";
                    }
                </script>
            </form>

            <form action="{{ route('registrar') }}" method="post" autocomplete="off" class="sign-up-form">
                @csrf
                @method('POST')
                <div class="logo">
                    <img src="{{asset('assets/img/logo-ortographic.webp')}}" alt="easyclass" />
                    <h4>Ortographic</h4>
                </div>

                <div class="heading">
                    <h2>Bienvenido a Ortographic!</h2>
                    <h6>¿Ya tienes cuenta?</h6>
                    <a href="#" class="toggle">Inicia sesión</a>
                </div>

                <div class="actual-form">
                    <div class="input-wrap">
                        <input type="text"
                            name="name"
                            class="input-field"
                            autocomplete="off"
                            required>
                        <label>Nombre de usuario</label>
                    </div>

                    <div class="input-wrap">
                        <input
                            type="email"
                            name="email"
                            class="input-field"
                            autocomplete="off"
                            required>
                        <label>Correo electronico</label>
                    </div>

                    <div class="input-wrap">
                        <input
                            type="password"
                            name="password"
                            minlength="8"
                            class="input-field"
                            autocomplete="off"
                            required />
                        <label>Contraseña</label>
                    </div>

                    <select name="rol" required>
                        <option value="" disabled selected>Tipo de usuario</option>
                        <option value="alumno">Alumno</option>
                        <option value="docente">Docente</option>
                    </select>

                    <input type="submit" value=Registrarse" class="sign-btn" />

                    <p class="text">
                        Al registrarse usted esta aceptando <a>Los terminos del servicio</a> y la<a>Politica de privacidad</a>.
                    </p>
                </div>
                <div class="or">o tambien puedes</div>
                <button class="sso" type="button" onclick="google()"><i class="bi bi-google"></i> Inicia con google</button>
                <!-- <button class="sso" type="button" onclick="facebook()"><i class="bi bi-facebook"></i> Inicia con facebook</button> -->

                <script>
                    function facebook() {
                        window.location.href = "{{ route('facebook.redirect') }}";
                    }

                    function google() {
                        window.location.href = "{{ route('google.redirect') }}";
                    }
                </script>
            </form>
        </div>

        <div class="carousel">
            <div class="images-wrapper">
                <img src="assets/img/image1.png" class="image img-1 show" alt="" />
                <img src="assets/img/image2.png" class="image img-2" alt="" />
                <img src="assets/img/image3.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
                <div class="text-wrap">
                    <div class="text-group">
                        <h2>Practica jugando</h2>
                        <h2>Diviértete aprendiendo ortografía</h2>
                        <h2>Reta a tus amigos</h2>
                    </div>
                </div>

                <div class="bullets">
                    <span class="active" data-value="1"></span>
                    <span data-value="2"></span>
                    <span data-value="3"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const errorMessage = "{{ session('error') }}";
        const successMessage = "{{ session('success') }}";

        if (errorMessage) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessage,
            });
        }

        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: successMessage,
            });
        }
    });
</script>
@endsection