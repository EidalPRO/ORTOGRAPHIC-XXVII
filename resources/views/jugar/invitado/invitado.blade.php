<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/juego/invitado.css')}}">
    <title>Ortographic - Invitado</title>

    <!-- Favicons -->
    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="icon">
    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="apple-touch-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class=" container" style="max-width: 440px;">
        <!-- <img src="{{asset('assets/img/juego/invitado/auris.png')}}" alt="" class="img"> 
        -->
        <header>
            <div class="puntaje">
                <img src="{{asset('assets/img/juego/invitado/puntos.png')}}" alt="">
                <span class="puntos">0</span>
            </div>
            <h5>Trivia Ortografía</h5>
            <div class="jugador">
                <span class="nombre">-</span>
                <img src="{{asset('assets/img/juego/invitado/user.png')}}" alt="">
            </div>
        </header>
    </div>

    <div class="e-card playing">
        <div class="image"></div>

        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>


        <div class="infotop">

            <img src="{{asset('assets/img/logo-ortographic.webp')}}" alt="Logo de Ortographic" class="icon">
            <br>
            Ortographic
            <!-- PANTALLA DE BIENVENIDA -->
            <main class="inicio">
                <h3>!Bienvenido al modo invitado!</h3>
                <p>Ingresa tu nombre para jugar</p>
                <input type="text" id="nombre">
                <button class="btn" id="comenzar">Comenzar</button>
                <button class="btn" id="regresar" onclick="regresar()">Regresar</button>
            </main>
            <br>
        </div>
    </div>

    <script>
        function regresar() {
            window.location.href = '/';
        }
    </script>
    <script src="{{asset('assets/js/juego/invitado/index.js')}}"></script>
</body>

</html>