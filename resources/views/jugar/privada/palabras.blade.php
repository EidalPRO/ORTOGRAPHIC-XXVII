<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="icon">
    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="apple-touch-icon">
    <title>Ortographic - Pasapalabras</title>
    <link rel="stylesheet" href="{{asset('assets/css/juego/palabras.css')}}">
    <style>
        .opciones {
            margin: 20px;
        }

        .opcion {
            margin: 20px;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <section id="pantalla-inicial">
        <h1 class="titulo">PASAPALABRAS</h1>
        <button id="comenzar">Comenzar el juego</button>
        <button id="reg2">Regresar</button>
    </section>
    <section id="pantalla-juego">
        <div class="container">
            <span id="tiempo">120</span>
        </div>

        <div class="contendor-pregunta">
            <span id="letra-pregunta">Z</span>
            <h2 id="pregunta">Pregunta...</h2>
            <input type="text" id="respuesta">
            <div class="opciones" id="opciones">
                <!-- Aquí se generara las opciones -->
            </div>
            <div class="botones">
                <button id="responder">Responder</button>
                <button id="pasar">Pasa Palabra</button>
            </div>
        </div>
    </section>
    <section id="pantalla-final">
        <h1>Resumen</h1>
        <h3>Acertadas</h3>
        <span id="acertadas">10</span>
        <h3 id="score">40% de acierto</h3>
        <button id="recomenzar">Jugar de Nuevo</button>
        <button id="salir">Salir</button>
        <div id="detalle-respuestas">
            <h3>Retroalimentación</h3>
            <ul id="lista-respuestas" style="text-align: justify;">
                <!-- Aquí se generara la lista -->
            </ul>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const TOTAL_PREGUNTAS = 10;
        const TIEMPO_DEL_JUEGO = 120;

        let reactivos = @json($reactivos);
        var datosSala = @json($sala);

        const bd_juego = reactivos.map((reactivo, index) => {
            return {
                id: index + 1,
                pregunta: reactivo.reactivo,
                respuesta: reactivo.respuesta,
                distractor1: reactivo.distractor1,
                distractor2: reactivo.distractor2,
                distractor3: reactivo.distractor3,
                retroalimentacion: reactivo.retroalimentacion
            };
        });

        var estadoPreguntas = new Array(bd_juego.length).fill(0);
        var respuestasUsuario = new Array(bd_juego.length).fill(null);
        var cantidadAcertadas = 0;

        var numPreguntaActual = -1;
        const timer = document.getElementById("tiempo");
        let timeLeft = TIEMPO_DEL_JUEGO;
        var countdown;

        var comenzar = document.getElementById("comenzar");
        comenzar.addEventListener("click", function(event) {
            document.getElementById("pantalla-inicial").style.display = "none";
            document.getElementById("pantalla-juego").style.display = "block";
            largarTiempo();
            cargarPregunta();
        });

        const container = document.querySelector(".container");
        for (let i = 1; i <= bd_juego.length; i++) {
            const circle = document.createElement("div");
            circle.classList.add("circle");
            circle.textContent = i;
            circle.id = `circle-${i}`;
            container.appendChild(circle);

            const angle = ((i - 1) / bd_juego.length) * Math.PI * 2 - (Math.PI / 2);
            const x = Math.round(95 + 120 * Math.cos(angle));
            const y = Math.round(95 + 120 * Math.sin(angle));
            circle.style.left = `${x}px`;
            circle.style.top = `${y}px`;
        }

        function cargarPregunta() {
            numPreguntaActual++;
            if (numPreguntaActual >= bd_juego.length) {
                numPreguntaActual = 0;
            }

            if (estadoPreguntas.indexOf(0) >= 0) {
                while (estadoPreguntas[numPreguntaActual] == 1) {
                    numPreguntaActual++;
                    if (numPreguntaActual >= bd_juego.length) {
                        numPreguntaActual = 0;
                    }
                }

                document.getElementById("letra-pregunta").textContent = bd_juego[numPreguntaActual].id;
                document.getElementById("pregunta").textContent = bd_juego[numPreguntaActual].pregunta;

                var letra = bd_juego[numPreguntaActual].id;
                document.getElementById(`circle-${letra}`).classList.add("pregunta-actual");

                mostrarOpciones();
            } else {
                clearInterval(countdown);
                mostrarPantallaFinal();
            }
        }

        function mostrarOpciones() {
            const opciones = [
                `1- ${bd_juego[numPreguntaActual].respuesta}`,
                `2- ${bd_juego[numPreguntaActual].distractor1}`,
                `3- ${bd_juego[numPreguntaActual].distractor2}`,
                `4- ${bd_juego[numPreguntaActual].distractor3}`
            ];

            // Función para mezclar las opciones
            function mezclarOpciones(array) {
                for (let i = array.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [array[i], array[j]] = [array[j], array[i]];
                }
            }

            mezclarOpciones(opciones);

            const opcionesElemento = document.getElementById("opciones");
            opcionesElemento.innerHTML = opciones.map(opcion => `<span class="opcion">${opcion}</span>`).join('');
        }

        var respuesta = document.getElementById("respuesta");
        var botonResponder = document.getElementById("responder");

        function controlarRespuesta(txtRespuesta) {
            respuestasUsuario[numPreguntaActual] = txtRespuesta;
            if (txtRespuesta === bd_juego[numPreguntaActual].respuesta) {
                cantidadAcertadas++;
                estadoPreguntas[numPreguntaActual] = 1;
                var letra = bd_juego[numPreguntaActual].id;
                document.getElementById(`circle-${letra}`).classList.remove("pregunta-actual");
                document.getElementById(`circle-${letra}`).classList.add("bien-respondida");
            } else {
                estadoPreguntas[numPreguntaActual] = 1;
                var letra = bd_juego[numPreguntaActual].id;
                document.getElementById(`circle-${letra}`).classList.remove("pregunta-actual");
                document.getElementById(`circle-${letra}`).classList.add("mal-respondida");
            }
            respuesta.value = "";
            cargarPregunta();
        }

        botonResponder.addEventListener("click", function() {
            if (respuesta.value === "") {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Debe ingresar un valor!"
                });
                return;
            }
            controlarRespuesta(respuesta.value);
        });

        respuesta.addEventListener("keyup", function(event) {
            if (event.key === "Enter") {
                if (respuesta.value === "") {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Debe ingresar un valor!"
                    });
                    return;
                }
                controlarRespuesta(respuesta.value);
            }
        });

        var pasar = document.getElementById("pasar");
        pasar.addEventListener("click", function(event) {
            var letra = bd_juego[numPreguntaActual].id;
            document.getElementById(`circle-${letra}`).classList.remove("pregunta-actual");
            cargarPregunta();
        });

        function largarTiempo() {
            countdown = setInterval(() => {
                timeLeft--;
                timer.innerText = timeLeft;

                if (timeLeft < 0) {
                    clearInterval(countdown);
                    mostrarPantallaFinal();
                }
            }, 1000);
        }

        function mostrarPantallaFinal() {
            document.getElementById("acertadas").textContent = cantidadAcertadas;
            document.getElementById("score").textContent = ((cantidadAcertadas * 100) / bd_juego.length).toFixed(2) + "% de acierto";
            const listaRespuestas = document.getElementById("lista-respuestas");
            listaRespuestas.innerHTML = "";
            bd_juego.forEach((pregunta, index) => {
                const li = document.createElement("li");
                const estado = respuestasUsuario[index] === pregunta.respuesta ? "Correcta" : "Incorrecta";
                let contenido = `<strong>Pregunta ${pregunta.id}:</strong> ${estado} - ${pregunta.pregunta} <br>`;
                if (estado === "Incorrecta") {
                    contenido += `&nbsp;&nbsp;| <strong>Respuesta correcta:</strong> ${pregunta.respuesta} <br>`;
                    contenido += `&nbsp;&nbsp;| <strong>Retroalimentación:</strong> ${pregunta.retroalimentacion} <br>`;
                }
                li.innerHTML = contenido;

                listaRespuestas.appendChild(li);
            });
            document.getElementById("pantalla-juego").style.display = "none";
            document.getElementById("pantalla-final").style.display = "block";

            var sala_id = datosSala.id_sala;
            var codigo_sala = datosSala.codigo_sala;
            var acertos = bd_juego.filter((pregunta, index) => respuestasUsuario[index] === pregunta.respuesta).map(pregunta => pregunta.id);
            var fallos = bd_juego.filter((pregunta, index) => respuestasUsuario[index] !== pregunta.respuesta && respuestasUsuario[index] !== null).map(pregunta => pregunta.id);

            fetch("{{ route('guardarResultados') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        sala_id: sala_id,
                        codigo_sala: codigo_sala,
                        acerto: acertos,
                        fallo: fallos
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Resultados guardados exitosamente');
                    } else {
                        console.error('Error al guardar los resultados:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error al guardar los resultados:', error);
                });
        }

        var recomenzar = document.getElementById("recomenzar");
        recomenzar.addEventListener("click", function() {
            location.reload();
        });

        var salir = document.getElementById("salir");
        salir.addEventListener("click", function() {
            window.location.href = `/sala/personalizada/${datosSala.codigo_sala}`;
        });

        var salir2 = document.getElementById("reg2");
        salir2.addEventListener("click", function() {
            window.location.href = `/sala/personalizada/${datosSala.codigo_sala}`;
        });
    </script>

</body>

</html>