<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/img/logo-ortographic.webp') }}" rel="icon">
    <link href="{{ asset('assets/img/logo-ortographic.webp') }}" rel="apple-touch-icon">
    <title>Evaluación: {{ $evaluacion->tipo }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100..900&display=swap');

        body {
            background-color: rgb(246, 237, 229);
            font-family: "Raleway", sans-serif;
        }

        .container {
            max-width: 800px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 30px;
        }

        .card {
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            border-radius: 10px 10px 0 0;
            padding: 10px;
        }

        button[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
            padding: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        @if ($evaluacionRealizada)
        <script>
            Swal.fire({
                title: 'Evaluación ya realizada',
                text: 'Ya has realizado esta evaluación.',
                icon: 'info',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('entrarPrivada', ['codigo_sala' => $sala->codigo_sala]) }}";
                }
            });
        </script>
        @else
        <script>
            Swal.fire({
                title: "Advertencia",
                icon: "warning",
                html: `Si las casillas están bloqueadas, ten en cuenta que si anteriormente estabas realizando una evaluación y no la concluiste, las casillas con las respuestas respondidas se bloquearán para todas las evaluaciones.<br>Es importante concluir esa evaluación pendiente una por una para que se desbloqueen las casillas bloqueadas.<br><strong>¡Piensa bien antes de responder!</strong> Una vez que selecciones una opción, no podrás modificarla. Asegúrate de que tu respuesta sea la definitiva.`,
                customClass: {
                    title: 'text-danger',
                    htmlContainer: 'my-custom-class'
                },
                confirmButtonText: 'Entendido'
            });
        </script>
        <h1 class="text-center">Evaluación: {{ $evaluacion->tipo }}</h1>
        <form method="POST" action="#" id="formEvaluacion">
            @csrf

            @if($reactivos && $reactivos->count() > 0)
            @foreach($reactivos as $reactivo)
            <div class="card">
                <div class="card-header">
                    Reactivo {{ $loop->iteration }}: {{ $reactivo->reactivo }}
                </div>
                <div class="form-group">
                    <label for="respuesta{{ $reactivo->id_reactivos }}">Selecciona tu respuesta:</label>
                    <select class="form-select" name="respuestas[{{ $reactivo->id_reactivos }}]" id="respuesta{{ $reactivo->id_reactivos }}">
                        <option value="">Selecciona una opción</option>
                        @php
                        $opciones = [
                        $reactivo->respuesta,
                        $reactivo->distractor1,
                        $reactivo->distractor2,
                        $reactivo->distractor3
                        ];
                        shuffle($opciones);
                        @endphp

                        @foreach($opciones as $opcion)
                        <option value="{{ $opcion }}" data-correct="{{ $reactivo->respuesta }}">{{ $opcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endforeach
            @else
            <p class="text-center">No se encontraron reactivos disponibles para esta evaluación.</p>
            @endif

            <div class="mt-4">
                <button type="submit" class="btn btn-primary" id="finalizarBtn">Finalizar Evaluación</button>
            </div>
            <div class="mt-4">
                <button class="btn btn-primary btn-regresar" style="display:none;" onclick="regresar()">Regresar</button>
            </div>
        </form>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Restaurar respuestas del almacenamiento local
        document.addEventListener('DOMContentLoaded', () => {
            const storedRespuestas = JSON.parse(localStorage.getItem('respuestas')) || {};
            for (const [key, value] of Object.entries(storedRespuestas)) {
                const select = document.getElementById(`respuesta${key}`);
                if (select) {
                    select.value = value;
                    select.disabled = true; // Bloquear el select
                }
            }
        });

        document.querySelectorAll('.form-select').forEach(select => {
            select.addEventListener('change', function() {
                // Guardar la respuesta en el almacenamiento local
                const reactivoId = this.id.replace('respuesta', '');
                const respuestas = JSON.parse(localStorage.getItem('respuestas')) || {};
                respuestas[reactivoId] = this.value;
                localStorage.setItem('respuestas', JSON.stringify(respuestas));

                // Bloquear el select después de la selección
                this.disabled = true;
            });
        });

        document.getElementById('formEvaluacion').addEventListener('submit', async function(event) {
            event.preventDefault();

            let correctas = [];
            let incorrectas = [];
            let preguntasSinResponder = [];
            const formElements = document.querySelectorAll('select');

            formElements.forEach(select => {
                const selectedOption = select.options[select.selectedIndex];
                if (selectedOption.value) {
                    const esCorrecta = selectedOption.value === selectedOption.getAttribute('data-correct');
                    const reactivoId = select.name.split('[')[1].split(']')[0];
                    if (esCorrecta) {
                        correctas.push(reactivoId);
                        select.closest('.form-group').style.backgroundColor = 'rgba(76, 175, 80, 0.2)';
                    } else {
                        incorrectas.push(reactivoId);
                        select.closest('.form-group').style.backgroundColor = 'rgba(244, 67, 54, 0.2)';
                    }
                } else {
                    preguntasSinResponder.push(select);
                }
            });

            if (preguntasSinResponder.length > 0) {
                Swal.fire({
                    title: 'Faltan preguntas por responder',
                    text: 'Debes responder todas las preguntas antes de finalizar la evaluación.',
                    icon: 'warning',
                    confirmButtonText: 'Aceptar'
                });
                return;
            }

            const calificacion = (correctas.length / (correctas.length + incorrectas.length)) * 10;

            Swal.fire({
                title: '¡Evaluación terminada!',
                text: `Acertaste ${correctas.length} de ${correctas.length + incorrectas.length} preguntas. Tu calificación es ${calificacion.toFixed(2)}.`,
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(async () => {
                try {
                    const response = await fetch(`/evaluacion/{{ $evaluacion->id_evaluacion }}/{{ $sala->id_sala }}/{{ $usuario->id}}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            correctas: correctas,
                            incorrectas: incorrectas,
                            sala_id: '{{ $sala->id_sala }}',
                            evaluacion_id: '{{ $evaluacion->id_evaluacion }}',
                            usuario_id: '{{ $usuario->id }}'
                        })
                    });

                    if (!response.ok) throw new Error('Error en el servidor');

                    const data = await response.json();
                    // console.log('Datos guardados correctamente:', data);

                    localStorage.removeItem('respuestas');

                    // Cambiar el botón de Finalizar a Regresar
                    document.getElementById('finalizarBtn').style.display = 'none';
                    document.querySelector('.btn-regresar').style.display = 'block';

                } catch (error) {
                    console.error('Error al guardar los datos:', error);
                }
            });
        });

        function regresar() {
            window.location.href = "{{ route('entrarPrivada', ['codigo_sala' => $sala->codigo_sala]) }}";
        }
    </script>
</body>

</html>