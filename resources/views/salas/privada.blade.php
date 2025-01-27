<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="icon">
    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="apple-touch-icon">
    <title>Ortographic - Sala Privada</title>
    <link rel="stylesheet" href="{{asset('assets/css/sala/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- header -->
    <header>
        <div class="logo">Ortographic</div>
        <ul class="menu">
            <li><a href="{{route(name: 'home')}}">Inicio</a></li>
            <li><a href="" id="codigoText"></a></li>
            <li><button class="ques"><i class="bi bi-question-circle"></i></button></li>
        </ul>
    </header>

    <!-- slider -->

    <div class="slider">
        <!-- list Items -->
        <div class="list">
            <div class="item active">
                <img src="{{asset('assets/img/salas/bd-palabras.webp')}}">
                <div class="content">
                    <p>Minijuego</p>
                    <h2>Pasapalabras</h2>
                    <p>
                        Responde preguntas durante 60 segundos escribiendo las palabras correctamente. Puedes pasar si no sabes una respuesta.
                        Mientras más aciertos, más puntos; las fallidas o no respondidas cuentan como errores.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="{{asset('assets/img/salas/ordena.webp')}}">
                <div class="content">
                    <p>Minijuego</p>
                    <h2>Escuchanos</h2>
                    <p>
                        ¡Pon a prueba tu mente! Escucha las palabras para escribirlas correctamente. ¿Cuántas podrás resolver?
                    </p>
                </div>
            </div>
            <!-- <div class="item">
                <img src="{{asset('assets/img/salas/ordena.webp')}}">
                <div class="content">
                    <p>Lecciones</p>
                    <h2>Trivia</h2>
                    <p>
                        Pequeñas trivias de práctica sin límite de tiempo, ideales para aprender a tu propio ritmo.
                    </p>
                </div>
            </div> -->
        </div>
        <!-- button arrows -->
        <div class="arrows">
            <button id="prev">
                < </button>
                    <button id="next">></button>
        </div>
        <!-- thumbnail -->
        <div class="thumbnail">
            <div class="item active" id="1">
                <img src="{{asset('assets/img/salas/bd-palabras.webp')}}">
                <div class="content">
                    Pasapalabras
                </div>
            </div>
            <div class="item" id="2">
                <img src="{{asset('assets/img/salas/ordena.webp')}}">
                <div class="content">
                    Desordenados
                </div>
            </div>
            <!-- <div class="item" id="3">
                <img src="{{asset('assets/img/salas/ordena.webp')}}">
                <div class="content">
                    Trivia
                </div>
            </div> -->
        </div>
    </div>

    <script src="{{asset('assets/js/sala/app.js')}}"></script>
    <script>
        let datosSala = @json($sala);
        console.log(datosSala);
        var codigoSala = datosSala.codigo_sala;
        var idSala = datosSala.id_sala;
        var nombreSala = datosSala.nombre;
        const bt1 = document.getElementById('1');
        const bt2 = document.getElementById('2');
        const codigoText = document.getElementById('codigoText');
        codigoText.innerText ="Sala: " + codigoSala;

        bt1.addEventListener('click', function() {
            window.location.href = `/sala/personalizada/pasapalabras/${codigoSala}`;
        });


        bt2.addEventListener('click', function() {
            window.location.href = `/sala/personalizada/escribe-correctamente/${codigoSala}`;
        });
    </script>
</body>

</html>