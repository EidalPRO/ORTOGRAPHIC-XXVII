<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="icon">
    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="apple-touch-icon">
    <title>Ortographic - Sala Global</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('assets/css/sala/style.css')}}">
</head>

<body>
    <!-- header -->
    <header>
        <div class="logo"></div>
        <ul class="menu">
            <li><a href="{{route('home')}}">Inicio</a></li>
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#tablaPosicionesModal">Tabla de posiciones</a>
            </li>
            <li><button class="ques">Sala Global</i></button></li>
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
                        Pequeñas trivias de práctica sin límite de tiempo, ideales para aprender a tu propio ritmo.
                    </p>
                </div>
            </div>
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
                    Escúchanos
                </div>
            </div>
            <div class="item" id="3">
                <img src="{{asset('assets/img/salas/bd-trivia.webp')}}">
                <div class="content">
                    Trivia
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tablaPosicionesModal" tabindex="-1" aria-labelledby="tablaPosicionesLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tablaPosicionesLabel" style="color: black;">Tablas de Posiciones por Minijuego</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Navegación entre minijuegos -->
                    <ul class="nav nav-tabs" id="minijuegosTabs" role="tablist"></ul>

                    <!-- Contenido de las tablas -->
                    <div class="tab-content" id="minijuegosTabContent" style="color: black;"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('/obtener-minijuegos')
                .then(response => response.json())
                .then(minijuegos => {
                    let tabsContainer = document.getElementById("minijuegosTabs");
                    let contentContainer = document.getElementById("minijuegosTabContent");

                    tabsContainer.innerHTML = "";
                    contentContainer.innerHTML = "";

                    minijuegos.forEach((minijuego, index) => {
                        let isActive = index === 0 ? "active" : "";

                        // Crear pestaña
                        let tab = document.createElement("li");
                        tab.className = "nav-item";
                        tab.innerHTML = `
                    <button class="nav-link ${isActive}" id="tab-${minijuego.idminijuegos}" data-bs-toggle="tab" data-bs-target="#content-${minijuego.idminijuegos}" type="button" role="tab">
                        ${minijuego.nombre}
                    </button>`;
                        tabsContainer.appendChild(tab);

                        // Crear contenido
                        let content = document.createElement("div");
                        content.className = `tab-pane fade show ${isActive}`;
                        content.id = `content-${minijuego.idminijuegos}`;
                        content.setAttribute("role", "tabpanel");
                        content.innerHTML = `
                    <h4 class="mt-3">${minijuego.nombre}</h4>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Posición</th>
                                <th>Jugador</th>
                                <th>Partidas Jugadas</th>
                                <th>Aciertos</th>
                                <th>Fallos</th>
                            </tr>
                        </thead>
                        <tbody id="tablaPosiciones-${minijuego.idminijuegos}">
                            <tr><td colspan="5">Cargando...</td></tr>
                        </tbody>
                    </table>
                    </div>`;
                        contentContainer.appendChild(content);

                        // Cargar datos para cada minijuego
                        cargarTabla(minijuego.idminijuegos);
                    });
                })
                .catch(error => console.error('Error al obtener los minijuegos:', error));
        });

        function cargarTabla(minijuegoId) {
            fetch(`/obtener-tabla-posiciones/${minijuegoId}`)
                .then(response => response.json())
                .then(data => {
                    let tbody = document.getElementById(`tablaPosiciones-${minijuegoId}`);
                    tbody.innerHTML = "";
                    if (data.length === 0) {
                        tbody.innerHTML = `<tr><td colspan="5">No hay datos disponibles</td></tr>`;
                    } else {
                        data.forEach((usuario, index) => {
                            let row = `<tr>
                        <td>${index + 1}</td>
                        <td>${usuario.name}</td>
                        <td>${usuario.partidas_jugadas}</td>
                        <td>${usuario.total_aciertos}</td>
                        <td>${usuario.total_fallos}</td>
                    </tr>`;
                            tbody.innerHTML += row;
                        });
                    }
                })
                .catch(error => console.error(`Error al obtener la tabla de posiciones del minijuego ${minijuegoId}:`, error));
        }
    </script>


    <script src="{{asset('assets/js/sala/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const bt1 = document.getElementById('1');
        const bt2 = document.getElementById('2');
        const bt3 = document.getElementById('3');

        function showSpinner() {
            document.getElementById('spinner').style.display = 'flex';
        }


        bt1.addEventListener('click', function() {
            showSpinner();
            setTimeout(() => {
                window.location.href = "{{route('globalPalabras')}}";
            });
        });


        bt2.addEventListener('click', function() {
            showSpinner();
            setTimeout(() => {
                window.location.href = "{{route('globalDictado')}}";
            });
        });

        bt3.addEventListener('click', function() {
            showSpinner();
            setTimeout(() => {
                window.location.href = "{{route('globalTrivia')}}";
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
    </script>
</body>

</html>