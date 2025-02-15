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
        <div class="logo"></div>
        <ul class="menu" style="margin-top: 20px;">
            <li><a href="{{ route('home') }}" style="cursor: pointer;  font-weight:bold;">Inicio</a></li>

            <!-- Verifica si el usuario es premium y tiene un rol específico -->
            @if(auth()->check() && auth()->user()->esPremium || in_array(auth()->user()->roles_id_roles, [2, 3]))
            <li><a id="admin" style="cursor: pointer;  font-weight:bold;">Administrar</a></li>

            <script>
                admin.addEventListener('click', function() {
                    window.location.href = `/sala/${codigoSala}/administrar`;
                });
            </script>
            @endif

            <li><a href="" id="codigoText" style="cursor: pointer;   font-weight:bold;"></a></li>
        </ul>
    </header>
    <!-- slider -->
    <div id="spinner" class="spinner-container">
        <!-- From Uiverse.io by Nawsome -->
        <div class="loader">
            <div>
                <ul>
                    <li>
                        <svg fill="currentColor" viewBox="0 0 90 120">
                            <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                        </svg>
                    </li>
                    <li>
                        <svg fill="currentColor" viewBox="0 0 90 120">
                            <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                        </svg>
                    </li>
                    <li>
                        <svg fill="currentColor" viewBox="0 0 90 120">
                            <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                        </svg>
                    </li>
                    <li>
                        <svg fill="currentColor" viewBox="0 0 90 120">
                            <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                        </svg>
                    </li>
                    <li>
                        <svg fill="currentColor" viewBox="0 0 90 120">
                            <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                        </svg>
                    </li>
                    <li>
                        <svg fill="currentColor" viewBox="0 0 90 120">
                            <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                        </svg>
                    </li>
                </ul>
            </div><span>Cargando</span>
        </div>
    </div>

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
                    <h2>Escúchanos</h2>
                    <p>
                        ¡Pon a prueba tu mente! Escucha las palabras para escribirlas correctamente. ¿Cuántas podrás resolver?
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="{{asset('assets/img/salas/bd-trivia.webp')}}">
                <div class="content">
                    <p>Lecciones</p>
                    <h2>Trivia</h2>
                    <p>
                        Responde las preguntas sin un limite de tiempo.
                    </p>
                </div>
            </div>
            @foreach($evaluacionesPendientes as $evaluacion)
            <div class="item">
                <img src="{{ asset('assets/img/salas/evaluacion.webp') }}" alt="Evaluación">
                <div class="content">
                    <p>Evaluación</p>
                    <h2>{{ $evaluacion->tipo }}</h2>
                    <p>
                        ¡Completa la evaluación "{{ $evaluacion->tipo }}" para avanzar!
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        <!-- button arrows -->
        <div class="arrows">
            <button id="prev"><</button>
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
                    Escúchanos
                </div>
            </div>
            <div class="item" id="3">
                <img src="{{asset('assets/img/salas/bd-trivia.webp')}}">
                <div class="content">
                    Trivia
                </div>
            </div>
            @foreach($evaluacionesPendientes as $evaluacion)
            <div class="item">
                <a href="{{ route('evaluacion.mostrar', ['id' => $evaluacion->id_evaluacion, 'codigoSala' => $sala->codigo_sala]) }}" class="link">
                    <img src="{{ asset('assets/img/salas/evaluacion-bg.webp') }}" alt="Evaluación">
                    <div class="content">
                        <p style="color: black;">{{ $evaluacion->tipo }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <script src="{{asset('assets/js/sala/app.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('spinner').style.display = 'none';
        });
        let datosSala = @json($sala);
        // console.log(datosSala);
        var codigoSala = datosSala.codigo_sala;
        var idSala = datosSala.id_sala;
        var nombreSala = datosSala.nombre;
        const bt1 = document.getElementById('1');
        const bt2 = document.getElementById('2');
        const bt3 = document.getElementById('3');
        const codigoText = document.getElementById('codigoText');
        codigoText.innerText = "Sala: " + codigoSala;
        const admin = document.getElementById('admin');

        // Mostrar spinner al hacer clic en cualquier elemento interactivo
        function showSpinner() {
            document.getElementById('spinner').style.display = 'flex';
        }

        // Eventos para los botones principales
        bt1.addEventListener('click', function(e) {
            e.preventDefault();
            showSpinner();
            setTimeout(() => {
                window.location.href = `/sala/personalizada/pasapalabras/${codigoSala}`;
            }, 100);
        });

        bt2.addEventListener('click', function(e) {
            e.preventDefault();
            showSpinner();
            setTimeout(() => {
                window.location.href = `/sala/personalizada/escribe-correctamente/${codigoSala}`;
            }, 100);
        });

        bt3.addEventListener('click', function(e) {
            e.preventDefault();
            showSpinner();
            setTimeout(() => {
                window.location.href = `/sala/personalizada/trivia/${codigoSala}`;
            }, 100);
        });

        // Eventos para los enlaces de evaluación
        document.querySelectorAll('a.link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                showSpinner();
                setTimeout(() => {
                    window.location.href = this.href;
                }, 100);
            });
        });

        // Opcional: Ocultar spinner si la página carga rápidamente
        window.addEventListener('load', function() {
            document.getElementById('spinner').style.display = 'none';
        });

        // Resetear spinner al cargar/recargar la página
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                document.getElementById('spinner').style.display = 'none';
            }
        });

        // Mostrar spinner al inicio de la carga
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('spinner').style.display = 'flex';
        });

        // Ocultar cuando todo esté cargado (imágenes, etc.)
        window.addEventListener('load', () => {
            document.getElementById('spinner').style.display = 'none';
        });

        document.addEventListener('click', (e) => {
            const target = e.target.closest('a, [data-spinner]');
            if (target && !target.hasAttribute('data-ignore-spinner')) {
                showSpinner();
            }
        });
    </script>
</body>

</html>