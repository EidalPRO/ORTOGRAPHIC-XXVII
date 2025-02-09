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
        const op1 = document.getElementById("1");
        const op2 = document.getElementById("2");
        const op3 = document.getElementById("3");
        const op4 = document.getElementById("4");
        const sig = document.getElementById('siguiente');
        const mostrarReactivo = document.getElementById("mostrar-reactivo");
        const contador = document.getElementById("contador");

        var id;
        var res;
        var preg;
        var d1;
        var d2;
        var d3;
        var retroalimentacion;
        var cont;
        var num;
        var preguntasRespondidas = 1;
        var porcentajeEfectividad;
        var tiempoTotal;
        var preguntasMostradas = [];
        var numerosGenerados = [];
        var reactivos = [];
        var fallo = 0;
        var salaId = 1;
        var posCorrect;
        var tiempoInicio;

        reactivos = @json($reactivos);
        // console.log(reactivos);

        tiempoInicio = performance.now();
        iniciarJuego();

        function iniciarJuego() {
            if (preguntasMostradas.length >= reactivos.length) {
                const tiempoFinal = performance.now();
                tiempoTotal = (tiempoFinal - tiempoInicio) / 1000;

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
                        window.location.href = "{{route('entrarGlobal')}}";
                    }
                });
                return;
            }

            do {
                id = generarNumeroUnico(0, reactivos.length - 1);
            } while (preguntasMostradas.includes(id));

            preguntasMostradas.push(id);

            var n = Math.floor(Math.random() * 4);
            posCorrect = (n == 1) ? 1 : (n == 2) ? 2 : (n == 3) ? 3 : 4;
            // posCorrect = 2;

            preg = reactivos[id].reactivo;
            d1 = reactivos[id].distractor1;
            d2 = reactivos[id].distractor2;
            d3 = reactivos[id].distractor3;
            res = reactivos[id].respuesta;
            retroalimentacion = reactivos[id].retroalimentacion;

            // console.log(d1);
            // console.log(d2);
            // console.log(d3);
            // console.log(res);


            contador.innerText = preguntasMostradas.length + "/" + reactivos.length;
            mostrarReactivo.innerText = preg;

            const opciones = [{
                    texto: res,
                    esCorrecta: true
                },
                {
                    texto: d1,
                    esCorrecta: false
                },
                {
                    texto: d2,
                    esCorrecta: false
                },
                {
                    texto: d3,
                    esCorrecta: false
                }
            ];

            mezclarArray(opciones);


            op1.innerText = opciones[0].texto;
            op1.dataset.esCorrecta = opciones[0].esCorrecta;

            op2.innerText = opciones[1].texto;
            op2.dataset.esCorrecta = opciones[1].esCorrecta;

            op3.innerText = opciones[2].texto;
            op3.dataset.esCorrecta = opciones[2].esCorrecta;

            op4.innerText = opciones[3].texto;
            op4.dataset.esCorrecta = opciones[3].esCorrecta;
        }

        function generarNumeroUnico(min, max) {
            var nuevoNumero;
            do {
                nuevoNumero = Math.floor(Math.random() * (max - min + 1)) + min;
            } while (numerosGenerados.includes(nuevoNumero));
            numerosGenerados.push(nuevoNumero);
            return nuevoNumero;
        }

        // Función para mezclar un arreglo aleatoriamente
        function mezclarArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
        }

        // Evento de clic para manejar la selección de opciones
        document.querySelectorAll('.opcion').forEach(opcion => {
            opcion.addEventListener('click', (e) => {
                const seleccionada = e.target;
                const esCorrecta = seleccionada.dataset.esCorrecta === "true";

                if (esCorrecta) {
                    seleccionada.classList.add('correcta');
                    Swal.fire("¡Correcto!", `${retroalimentacion}`, "success");
                } else {
                    seleccionada.classList.add('incorrecta'); // Marca en rojo la respuesta incorrecta
                    document.querySelector('[data-es-correcta="true"]').classList.add('correcta'); // Marca en verde la correcta
                    Swal.fire("Incorrecto", `${retroalimentacion}`, "error");
                }

                // Deshabilitar todas las opciones después de la selección
                document.querySelectorAll('.opcion').forEach(btn => {
                    btn.classList.add('no-events'); // Añade la clase que deshabilita eventos
                });

                // Habilitar el botón "Siguiente" después de una selección
                sig.classList.remove('desabilitada');
            });
        });

        // Botón "Siguiente" para reiniciar los estilos y cargar una nueva pregunta
        sig.addEventListener('click', () => {
            // Reiniciar estilos de los botones
            document.querySelectorAll('.opcion').forEach(btn => {
                btn.classList.remove('correcta', 'incorrecta', 'no-events');
            });

            // Deshabilitar temporalmente el botón "Siguiente"
            sig.classList.add('desabilitada');

            // Cargar una nueva pregunta
            iniciarJuego();
        });
    </script>
</body>

</html>