<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="icon">
    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="apple-touch-icon">
    <title>Ortographic - Dictado Ortográfico</title>
    <link rel="stylesheet" href="{{asset('assets/css/sala/estilo.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <section id="pantalla-inicio">
        <h2>Escucha la <span>palabra</span></h2>
        <h2>y escríbela <span>correctamente.</span></h2>
        <button onclick="comenzarJuego()">Jugar</button>
        <button onclick="salir()">Regresar</button>
    </section>
    <section id="pantalla-juego" style="display: none;">
        <h2>Escucha la <span>palabra</span></h2>
        <h2>y escríbela <span>correctamente.</span></h2>

        <div class="contenedor-pais" id="pais"></div>

        <input type="text" id="paisIngresado" onkeyup="comparar()">

        <div id="myProgress">
            <div id="myBar"></div>
        </div>

        <div class="acertadas">
            <i class="fa-solid fa-thumbs-up"></i>
            <span id="contador">0</span>
        </div>
    </section>

    <!-- Modal de resultados -->
    <div class="modal fade" id="modalResultados" tabindex="-1" aria-labelledby="modalResultadosLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalResultadosLabel">Juego Finalizado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                    <p>Acertaste <strong id="cantidadAcertadas"></strong> palabras.</p>
                    <p><strong>Palabras fallidas y retroalimentación:</strong></p>
                    <div id="listaPalabrasFallidas"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="location.reload()">Jugar de nuevo</button>
                    <button type="button" class="btn btn-secondary" onclick="salir()">Salir</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=4Zvd5aBo"></script>
    <script>
        let reactivos = @json($reactivos);
        let codigo_sala = 'ORT001';
        let paises = reactivos.map(reactivo => reactivo.palabra);
        let retroalimentaciones = reactivos.map(reactivo => reactivo.retroalimentacion);
        let paisesDesordenados = [];
        let palabrasFallidas = [];
        let palabrasAcertadas = [];
        let posJuegoActual = 0;
        let cantidadAcertados = 0;

        async function speakText(text) {
            try {
                // Verificar si ResponsiveVoice está disponible
                if (typeof responsiveVoice !== "undefined") {
                    responsiveVoice.speak(text, "Spanish Latin American Female", {
                        rate: 0.9
                    });
                } else {
                    throw new Error("ResponsiveVoice no está cargado correctamente.");
                }
            } catch (error) {
                console.error("Error al reproducir el audio:", error);
            }
            
            // ElevenLabs 
            // try {
            //     const response = await fetch("/generar-audio", {
            //         method: "POST",
            //         headers: {
            //             "Content-Type": "application/json",
            //             "X-CSRF-TOKEN": "{{ csrf_token() }}"
            //         },
            //         body: JSON.stringify({
            //             texto: text
            //         })
            //     });

            //     if (!response.ok) {
            //         throw new Error("Error al generar el audio");
            //     }

            //     const audioBlob = await response.blob();
            //     const audioUrl = URL.createObjectURL(audioBlob);
            //     const audio = new Audio(audioUrl);
            //     audio.play();
            // } catch (error) {
            //     console.error("Error al reproducir el audio:", error);
            // }
        }

        async function speakNextWord() {
            if (posJuegoActual < paises.length) {
                await speakText(paises[posJuegoActual]);
                // await speakText(`La palabra es: ${paises[posJuegoActual]}`);
            }
        }

        function desordenarPaises() {
            paisesDesordenados = paises.map(pais => {
                let letras = pais.split('');
                letras = letras.sort(() => Math.random() - 0.5);
                return letras.join('');
            });
        }

        async function mostrarNuevoPais() {
            if (posJuegoActual >= paises.length) {
                mostrarPantallaFinal();
                return;
            }

            let contenedorPais = document.getElementById("pais");
            contenedorPais.innerHTML = "";

            let pais = paisesDesordenados[posJuegoActual];
            let letras = pais.split('');

            x = 0;
            clearInterval(idInterval);
            move();

            letras.forEach(letra => {
                let div = document.createElement("div");
                div.className = "letra";
                div.innerHTML = letra;
                contenedorPais.appendChild(div);
            });

            await speakNextWord();
        }

        function mostrarPantallaFinal() {
            clearInterval(idInterval);

            let palabrasConRetro = palabrasFallidas.map(item => {
                return `<p><strong>${item.palabra}:</strong> ${item.retroalimentacion}</p>`;
            }).join('');

            document.getElementById("cantidadAcertadas").innerText = cantidadAcertados;
            document.getElementById("listaPalabrasFallidas").innerHTML = palabrasConRetro || "<p>¡No hubo fallos!</p>";

            let modal = new bootstrap.Modal(document.getElementById('modalResultados'));
            modal.show();

            const acertos = palabrasAcertadas.map(item => item.id_palabra);
            const fallos = palabrasFallidas.map(item => item.id_palabra);

            fetch("{{ route('guardarResultadosGlobal') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        minijuego: 2,
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

        function comparar() {
            let paisOrdenado = paises[posJuegoActual];
            let paisIngresado = document.getElementById("paisIngresado").value;

            if (paisOrdenado === paisIngresado) {
                palabrasAcertadas.push(reactivos[posJuegoActual]);
                posJuegoActual++;
                cantidadAcertados++;
                document.getElementById("contador").innerHTML = cantidadAcertados;
                document.getElementById("paisIngresado").value = "";
                mostrarNuevoPais();
            }
        }

        let x = 0;
        let idInterval;

        function move() {
            if (x === 0) {
                x = 1;
                let elem = document.getElementById("myBar");
                let width = 1;
                idInterval = setInterval(frame, 100);

                function frame() {
                    if (width >= 100) {
                        clearInterval(idInterval);
                        x = 0;

                        palabrasFallidas.push({
                            ...reactivos[posJuegoActual],
                            palabra: paises[posJuegoActual],
                            retroalimentacion: retroalimentaciones[posJuegoActual]
                        });

                        posJuegoActual++;
                        document.getElementById("paisIngresado").value = "";
                        mostrarNuevoPais();
                    } else {
                        width++;
                        elem.style.width = width + "%";
                    }
                }
            }
        }

        function comenzarJuego() {
            paisesDesordenados = [];
            palabrasFallidas = [];
            palabrasAcertadas = [];
            posJuegoActual = 0;
            cantidadAcertados = 0;
            desordenarPaises();
            document.getElementById("pantalla-inicio").style.display = "none";
            document.getElementById("pantalla-juego").style.display = "block";
            mostrarNuevoPais();
            document.getElementById("contador").innerHTML = 0;
            document.getElementById("paisIngresado").focus();
        }

        function salir() {
            window.location.href = `{{route('entrarGlobal')}}`;
        }
    </script>
</body>

</html>