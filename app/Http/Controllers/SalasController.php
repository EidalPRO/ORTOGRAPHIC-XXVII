<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use App\Models\EvaluacionReactivo;
use App\Models\Leccion;
use App\Models\Minijuego;
use App\Models\Palabra;
use App\Models\Reactivo;
use App\Models\ReactivoLeccion;
use App\Models\Sala;
use App\Models\SalaMinijuegoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SalasController extends Controller
{
    public function entrar()
    {
        return view('salas.global');
    }

    public function mostrarTriviaGlobal()
    {
        $reactivos = Reactivo::all()->shuffle()->take(10);
        $sala = Sala::where('codigo_sala', 'ORT001')->firstOrFail();

        return view('jugar.global.trivia', compact('reactivos', 'sala'));
    }

    public function palabrasGlobal()
    {

        $reactivos = Reactivo::all()->shuffle()->take(10);

        return view('jugar.global.palabras', compact('reactivos'));
    }

    public function dictadoGlobal()
    {

        $reactivos = Palabra::all()->shuffle()->take(10);

        return view('jugar.global.dictado', compact('reactivos'));
    }

    public function guardarResultadosGlobal(Request $request)
    {
        $sala = Sala::where('codigo_sala', 'ORT001')->firstOrFail();

        SalaMinijuegoUsuario::updateOrInsert(
            [
                'sala_id' => $sala->id_sala,
                'minijuegos_id' => $request->minijuego,
                'user_id' => Auth::id(),
            ],
            [
                'puntos' => DB::raw("puntos + {$request->puntos}"), // Suma puntos sin sobrescribir
                'acerto' => json_encode($request->acerto),
                'fallo' => json_encode($request->fallo),
                'fecha' => now(),
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Resultados guardados exitosamente'
        ]);
    }

    public function obtenerMinijuegos()
    {
        $minijuegos = Minijuego::all();
        return response()->json($minijuegos);
    }
    public function obtenerTablaPosiciones($minijuegoId)
    {
        $salaId = 1;

        $posiciones = DB::table('sala_minijuegos_usuario')
            ->join('users', 'sala_minijuegos_usuario.user_id', '=', 'users.id')
            ->select(
                'users.id',
                'users.name',
                DB::raw('COUNT(sala_minijuegos_usuario.user_id) as partidas_jugadas'),
                DB::raw('SUM(sala_minijuegos_usuario.puntos) as total_puntos') // Solo se suma el total de puntos
            )
            ->where('sala_minijuegos_usuario.sala_id', $salaId)
            ->where('sala_minijuegos_usuario.minijuegos_id', $minijuegoId)
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_puntos') // Ordenar por más puntos
            ->orderByDesc('partidas_jugadas') // Luego por más partidas jugadas
            ->get();

        return response()->json($posiciones);
    }

    //  SALAS PRVADAS 

    public function privada($codigo_sala)
    {
        // Obtener la sala actual
        $sala = Sala::where('codigo_sala', $codigo_sala)->firstOrFail();

        // Obtener evaluaciones pendientes (sin completarlas aún por el usuario)
        $evaluacionesPendientes = Evaluacion::where('sala_id', $sala->id_sala)
            ->whereNotIn('id_evaluacion', function ($query) use ($sala) { // Asegurar acceso a $sala
                $query->select('evaluacion_id')
                    ->from('evaluacion_reactivos')
                    ->where('user_id', Auth::id())
                    ->where('sala_id', $sala->id_sala);
            })
            ->get();

        return view('salas.privada', compact('sala', 'evaluacionesPendientes'));
    }

    // pasapalabras 
    public function palabrasPrivada($codigo_sala)
    {
        $reactivos = Reactivo::all()->shuffle()->take(10);
        $sala = Sala::where('codigo_sala', $codigo_sala)->first();

        return view('jugar.privada.palabras', compact('reactivos', 'sala'));
    }
    public function guardarResultados(Request $request)
    {
        $codigo_sala = $request->input('codigo_sala');
        $minijuego_id = 1;
        $user_id = Auth::id();
        $acerto = $request->input('acerto');
        $fallo = $request->input('fallo');
        $fecha = now();

        $sala = Sala::where('codigo_sala', $codigo_sala)->first();
        if (!$sala) {
            return response()->json(['success' => false, 'message' => 'Sala no encontrada'], 404);
        }
        $sala_id = $sala->id_sala;

        $resultados = new SalaMinijuegoUsuario([
            'sala_id' => $sala_id,
            'minijuegos_id' => $minijuego_id,
            'user_id' => $user_id,
            'acerto' => json_encode($acerto),
            'fallo' => json_encode($fallo),
            'fecha' => $fecha,
        ]);

        $resultados->save();

        return response()->json(['success' => true, 'message' => 'Resultados guardados exitosamente']);
    }

    // dicatadp
    public function dictadoPrivada($codigo_sala)
    {
        $reactivos = Palabra::all()->shuffle()->take(10);
        $sala = Sala::where('codigo_sala', $codigo_sala)->first();

        return view('jugar.privada.dictado', compact('reactivos', 'sala'));
    }

    public function guardarResultadosDic(Request $request)
    {
        $sala_id = $request->input('sala_id');
        $codigo_sala = $request->input('codigo_sala');
        $minijuego_id = 2;
        $user_id = Auth::id();
        $acerto = $request->input('acerto');
        $fallo = $request->input('fallo');
        $fecha = now();

        $resultados = new SalaMinijuegoUsuario([
            'sala_id' => $sala_id,
            'minijuegos_id' => $minijuego_id,
            'user_id' => $user_id,
            'acerto' => json_encode($acerto),
            'fallo' => json_encode($fallo),
            'fecha' => $fecha,
        ]);

        $resultados->save();

        return response()->json(['success' => true, 'message' => 'Resultados guardados exitosamente']);
    }

    public function triviaPrivada($codigo_sala)
    {
        $reactivos = Reactivo::all()->shuffle()->take(10);
        $sala = Sala::where('codigo_sala', $codigo_sala)->first();

        return view('jugar.privada.trivia', compact('reactivos', 'sala'));
    }

    public function guardarResultadosTri(Request $request)
    {
        $sala = Sala::where('codigo_sala', $request->codigo_sala)->firstOrFail();

        $resultados = new SalaMinijuegoUsuario([
            'sala_id' => $sala->id_sala,
            'minijuegos_id' => 3,
            'user_id' => Auth::id(),
            'acerto' => json_encode($request->acerto),
            'fallo' => json_encode($request->fallo),
            'fecha' => now(),
        ]);

        $resultados->save();

        return response()->json([
            'success' => true,
            'message' => 'Resultados guardados exitosamente'
        ]);
    }

    // evaluaciones
    public function mostrarEvaluacion($id, $codigo_sala)
    {
        $evaluacion = Evaluacion::findOrFail($id);
        $reactivosJson = json_decode($evaluacion->reactivos, true);

        $sala = Sala::where('codigo_sala', $codigo_sala)->firstOrFail();

        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta evaluación.');
        }

        $reactivos = Reactivo::whereIn('id_reactivos', $reactivosJson)->get();

        $evaluacionRealizada = EvaluacionReactivo::where('evaluacion_id', $id)
            ->where('sala_id', $sala->id_sala)
            ->where('user_id', $usuario->id)
            ->exists();

        if ($evaluacionRealizada) {
            return view('private.evaluacion', compact('evaluacion', 'reactivos', 'sala', 'usuario'))
                ->with('evaluacionRealizada', true);
        }

        return view('private.evaluacion', compact('evaluacion', 'reactivos', 'sala', 'usuario'))
            ->with('evaluacionRealizada', false);
    }

    public function guardarEvaluacion(Request $request, $evaluacion_id, $sala_id, $user_id)
    {
        Log::info('Entrando a la función guardarEvaluacion.');

        try {
            Log::info('ID de Evaluación: ' . $evaluacion_id . ', Sala ID: ' . $sala_id . ', User ID: ' . $user_id);

            // Obtener las respuestas correctas e incorrectas
            $correctas = $request->input('correctas', []);
            $incorrectas = $request->input('incorrectas', []);

            // Asegurarse de que tanto acerto como fallo tengan un valor, incluso si están vacíos
            $acerto = json_encode($correctas);
            $fallo = json_encode($incorrectas);

            Log::info('Aciertos JSON: ' . $acerto);
            Log::info('Fallos JSON: ' . $fallo);

            // Crear el registro en la tabla evaluacion_reactivos
            $evaluacionReactivo = EvaluacionReactivo::create([
                'evaluacion_id' => $evaluacion_id,
                'sala_id' => $sala_id,
                'user_id' => $user_id,
                'acerto' => $acerto,
                'fallo' => $fallo,
            ]);

            Log::info('Resultados guardados correctamente: ' . $evaluacionReactivo);

            $total = count($correctas) + count($incorrectas);
            $calificacion = (count($correctas) / $total) * 10;

            Log::info('Total respuestas: ' . $total . ', Aciertos: ' . count($correctas) . ', Calificación: ' . $calificacion);
            Log::info('Registro creado: ' . json_encode($evaluacionReactivo));

            return response()->json([
                'message' => 'Evaluación guardada correctamente',
                'aciertos' => count($correctas),
                'calificacion' => $calificacion,
            ]);
        } catch (\Exception $e) {
            Log::error('Error al guardar evaluación: ' . $e->getMessage());
            return response()->json([
                'message' => 'Ocurrió un error al guardar la evaluación',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
