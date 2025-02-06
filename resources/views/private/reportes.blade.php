<!DOCTYPE html>
<html>

<head>
    <title>Reporte de Evaluación</title>
    <title>Reporte de Evaluación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 0;
        }

        .header-institucional {
            margin: 0;
            text-align: center;
            margin-bottom: 25px;
        }

        .institucion-principal {
            font-size: 16px;
            font-weight: bold;
            line-height: 1.2;
        }

        .subsecretaria,
        .direccion,
        .subdireccion {
            font-size: 12px;
            line-height: 1.1;
            margin: 3px 0;
        }

        .header {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            margin-top: 15px;
        }


        .section {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .tabla-titulo {
            font-size: 12px;
            text-align: center;
        }

        .contenido-tabla {
            font-size: 10px;
            text-align: justify;
        }
    </style>
</head>

<body>
    <!-- Encabezado institucional -->
    <div class="header-institucional">
        <div class="institucion-principal">
            DIRECCIÓN GENERAL DE EDUCACIÓN<br>
            TECNOLÓGICA INDUSTRIAL Y DE SERVICIOS
        </div>

        <div class="subsecretaria">
            Subsecretaría de Educación Media Superior
        </div>

        <div class="direccion">
            Dirección General de Educación Tecnológica Industrial y de Servicios<br>
            Dirección Académica e Innovación Educativa
        </div>

        <div class="subdireccion">
            Subdirección de Vinculación
        </div>
    </div>
    <div class="header">Ortographic - {{ now()->format('d/m/Y') }}</div>

    <div class="section">
        <strong>Evaluación:</strong> {{ $evaluacion->tipo }}
        <br><strong>Sala:</strong> {{ $sala->nombre }} (Código: {{ $sala->codigo_sala }})
    </div>

    <div class="section">
        <h3>Usuarios que respondieron:</h3>
        <table>
            <tr class="tabla-titulo">
                <th>Usuario</th>
                <th>Reactivos Acertados</th>
                <th>Reactivos Fallados</th>
                <th>Total Aciertos</th>
                <th>Calificación</th>
            </tr>
            @foreach ($usuarios as $usuario)
            <tr class="contenido-tabla">
                <td>{{ $usuario['usuario'] }}</td>
                <td>
                    @foreach ($usuario['aciertos'] as $acierto)
                    {{ $acierto->reactivo }} ({{ $acierto->respuesta }}) <br>
                    @endforeach
                </td>
                <td>
                    @foreach ($usuario['fallos'] as $fallo)
                    {{ $fallo->reactivo }} ({{ $fallo->respuesta }}) <br>
                    @endforeach
                </td>
                <td>{{ $usuario['total'] }}</td>
                <td>{{ $usuario['calificacion'] }}</td>
            </tr>
            @endforeach
        </table>

    </div>
</body>

</html>