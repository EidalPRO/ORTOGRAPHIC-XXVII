<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/css/juego/invitado.css')}}">
    <title>Ortographic - Invitado</title>

    <!-- Favicons -->
    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="icon">
    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="apple-touch-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class=" container" style="max-width: 440px;">
        <!-- <img src="{{asset('assets/img/juego/invitado/auris.png')}}" alt="" class="img"> 
        -->
        <header>
            <div class="puntaje">
                <!-- <img src="{{asset('assets/img/juego/invitado/puntos.png')}}" alt="">
                <span class="puntos" id="puntos">0</span> -->
            </div>
            <h5>Trivia Ortografía</h5>
            <div class="jugador">
                <span class="nombre" id="nombre">{{Auth::user() -> name}}</span>
                <img src="{{asset('assets/img/juego/invitado/user.png')}}" alt="">
            </div>
        </header>
    </div>

    <div class="e-card playing">
        <div class="image"></div>

        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>


        <div class="infotop2">
            <img src="{{asset('assets/img/logo-ortographic.webp')}}" alt="Logo de Ortographic" class="icon2">
            <!-- PANTALLA DE BIENVENIDA -->
            <main class="juego">
                <div class="contador-pregunta">
                    <span id="contador" class="num-pregunta m-0 p-0">0</span>
                </div>
                <p id="mostrar-reactivo" class="pregunta">
                    ¿Texto de la pregunta 1?
                </p>

                <div class="opciones" id="opciones">
                    <button class="opcion" id="1">Opcion A</button>
                    <button class="opcion" id="2">Opcion B</button>
                    <button class="opcion" id="3">Opcion C</button>
                    <button class="opcion" id="4">OPCION D</button>
                </div>

                <button class="btn" id="siguiente">Siguiente</button>
            </main>
            <br>
        </div>
    </div>

    <!-- <script src="{{asset('assets/js/juego/invitado/juego.js')}}"></script> -->
    <script>
        // Elementos del DOM
        const op1 = document.getElementById("1");
        const op2 = document.getElementById("2");
        const op3 = document.getElementById("3");
        const op4 = document.getElementById("4");
        const sig = document.getElementById('siguiente');
        const mostrarReactivo = document.getElementById("mostrar-reactivo");
        const contador = document.getElementById("contador");

        // Variables del juego
        let id;
        let reactivos = @json($reactivos);
        let preguntasMostradas = [];
        let numerosGenerados = [];
        let aciertos = []; // IDs de reactivos acertados
        let fallos = []; // IDs de reactivos fallados
        let tiempoInicio;
        const sala= @json($sala); // Obtener código de sala desde el controlador

        // Inicializar juego
        tiempoInicio = performance.now();
        iniciarJuego();

        async function iniciarJuego() {
            // Verificar fin del juego
            if (preguntasMostradas.length >= reactivos.length) {
                const tiempoFinal = performance.now();
                const tiempoTotal = (tiempoFinal - tiempoInicio) / 1000;

                try {
                    // Guardar resultados primero
                    await guardarResultadosTri();

                    // Mostrar alerta después de guardar
                    Swal.fire({
                        title: '¡Juego Terminado!',
                        html: `Has respondido todas las preguntas<br>
                        Tiempo total: ${tiempoTotal.toFixed(2)} segundos`,
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: 'Jugar de nuevo',
                        cancelButtonText: 'Salir',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        } else {
                            window.location.href = `/sala/personalizada/${sala.codigo_sala}`;
                        }
                    });
                } catch (error) {
                    console.error('Error:', error);
                    Swal.fire('Error', 'No se pudieron guardar los resultados', 'error');
                }
                return;
            }

            // Generar nueva pregunta
            do {
                id = generarNumeroUnico(0, reactivos.length - 1);
            } while (preguntasMostradas.includes(id));

            preguntasMostradas.push(id);

            // Configurar pregunta actual
            const reactivoActual = reactivos[id];
            mostrarReactivo.innerText = reactivoActual.reactivo;
            contador.innerText = `${preguntasMostradas.length}/${reactivos.length}`;

            // Mezclar opciones de respuesta
            const opciones = [{
                    texto: reactivoActual.respuesta,
                    esCorrecta: true
                },
                {
                    texto: reactivoActual.distractor1,
                    esCorrecta: false
                },
                {
                    texto: reactivoActual.distractor2,
                    esCorrecta: false
                },
                {
                    texto: reactivoActual.distractor3,
                    esCorrecta: false
                }
            ];
            mezclarArray(opciones);

            // Asignar opciones a los botones
            [op1, op2, op3, op4].forEach((boton, index) => {
                boton.innerText = opciones[index].texto;
                boton.dataset.esCorrecta = opciones[index].esCorrecta;
            });
        }

        // Función para guardar resultados en el servidor
        async function guardarResultadosTri() {
            try {
                const response = await fetch("{{ route('guardarResultados3') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        codigo_sala: sala.codigo_sala,
                        acerto: aciertos,
                        fallo: fallos
                    })
                });

                const data = await response.json();
                if (!data.success) {
                    throw new Error(data.message);
                }
            } catch (error) {
                console.error('Error al guardar resultados:', error);
                throw error;
            }
        }

        // Eventos de interacción
        document.querySelectorAll('.opcion').forEach(opcion => {
            opcion.addEventListener('click', (e) => {
                const seleccionada = e.target;
                const esCorrecta = seleccionada.dataset.esCorrecta === "true";
                const reactivoId = reactivos[id].id;

                // Registrar resultado
                if (esCorrecta) {
                    aciertos.push(reactivoId);
                    seleccionada.classList.add('correcta');
                    Swal.fire("¡Correcto!", reactivos[id].retroalimentacion, "success");
                } else {
                    fallos.push(reactivoId);
                    seleccionada.classList.add('incorrecta');
                    document.querySelector('[data-es-correcta="true"]').classList.add('correcta');
                    Swal.fire("Incorrecto", reactivos[id].retroalimentacion, "error");
                }

                // Deshabilitar opciones
                document.querySelectorAll('.opcion').forEach(btn => {
                    btn.classList.add('no-events');
                });

                // Habilitar siguiente
                sig.classList.remove('desabilitada');
            });
        });

        sig.addEventListener('click', () => {
            document.querySelectorAll('.opcion').forEach(btn => {
                btn.classList.remove('correcta', 'incorrecta', 'no-events');
            });
            sig.classList.add('desabilitada');
            iniciarJuego();
        });

        // Funciones utilitarias
        function generarNumeroUnico(min, max) {
            let nuevoNumero;
            do {
                nuevoNumero = Math.floor(Math.random() * (max - min + 1)) + min;
            } while (numerosGenerados.includes(nuevoNumero));
            numerosGenerados.push(nuevoNumero);
            return nuevoNumero;
        }

        function mezclarArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
        }
    </script>
</body>

</html>