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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <section id="pantalla-inicio">
        <h2>Escucha la <span>palabra</span></h2>
        <h2>y escríbela <span>correctamente.</span></h2>
        <button onclick="comenzarJuego()">JUGAR AHORA!</button>
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
    <script>
        let reactivos = @json($reactivos);
        let datosSala = @json($sala);
        let paises = reactivos.map(reactivo => reactivo.palabra);
        let retroalimentaciones = reactivos.map(reactivo => reactivo.retroalimentacion);
        let paisesDesordenados = [];
        let palabrasFallidas = [];
        let palabrasAcertadas = [];
        let posJuegoActual = 0;
        let cantidadAcertados = 0;

        let voices = [];
        let selectedVoice = null;

        // Cargar voces y seleccionar las de es-MX
        function loadVoices() {
            voices = window.speechSynthesis.getVoices();
            voices = voices.filter(voice => voice.lang === "es-MX" || voice.lang.startsWith("es"));
            if (!selectedVoice && voices.length > 0) {
                selectedVoice = voices[0]; // Seleccionar la primera voz como predeterminada
            }
        }

        // Mostrar el SweetAlert inicial para seleccionar la voz
        async function showInitialAlert() {
            await Swal.fire({
                title: 'Aviso importante',
                html: `
                <p>Este minijuego está en fase beta. Puede presentar errores y no ser compatible con algunos navegadores.</p>
                <p>Selecciona la voz que prefieres para escuchar las palabras:</p>
                <select id="voiceSelector" class="swal2-input">
                    ${voices.map((voice, index) => `<option value="${index}">${voice.name} (${voice.lang})</option>`).join('')}
                </select>
            `,
                icon: 'warning',
                confirmButtonText: 'Aceptar',
                allowOutsideClick: false,
                didOpen: () => {
                    document.getElementById('voiceSelector').value = voices.findIndex(voice => voice === selectedVoice);
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const voiceIndex = document.getElementById('voiceSelector').value;
                    selectedVoice = voices[voiceIndex];
                }
            });
        }

        async function speakText(text) {
            return new Promise((resolve) => {
                const utterance = new SpeechSynthesisUtterance(text);
                utterance.voice = selectedVoice;
                utterance.onend = resolve;
                window.speechSynthesis.speak(utterance);
            });
        }

        async function speakNextWord() {
            if (posJuegoActual < paises.length) {
                await speakText(paises[posJuegoActual]);
            }
        }

        window.speechSynthesis.onvoiceschanged = loadVoices;

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
                return `<strong>${item.palabra}:</strong> ${item.retroalimentacion}`;
            }).join('<br><br>');

            Swal.fire({
                title: 'Juego finalizado',
                html: `
                <p>Acertaste <strong>${cantidadAcertados}</strong> palabras.</p>
                <p><strong>Palabras fallidas y retroalimentación:</strong></p>
                <div style="text-align: justify;">
                    ${palabrasConRetro || "¡No hubo fallos!"}
                </div>
            `,
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Jugar de nuevo',
                cancelButtonText: 'Salir',
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    window.location.href = `/sala/personalizada/${datosSala.codigo_sala}`;
                }
            });

            const sala_id = datosSala.id_sala;
            const acertos = palabrasAcertadas.map(item => item.id_palabra);
            const fallos = palabrasFallidas.map(item => item.id_palabra);

            fetch("{{ route('guardarResultados2') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        sala_id: sala_id,
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
                idInterval = setInterval(frame, 60);

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

        window.onload = () => {
            loadVoices();
            showInitialAlert();
        };
    </script>
</body>

</html>