<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use App\Models\EvaluacionReactivo;
use App\Models\Reactivo;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PersonalizarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($codigo_sala)
    {
        // Obtener la sala por su código
        $sala = Sala::where('codigo_sala', $codigo_sala)->first();

        if (!$sala) {
            return redirect('/')->with('error', 'Sala no encontrada.');
        }

        // Verificar si el usuario tiene permisos
        if (auth()->user()->esPremium || in_array(auth()->user()->roles_id_roles, [2, 3])) {

            $usuariosEnSala = DB::table('sala_usuario')
                ->join('users', 'sala_usuario.user_id', '=', 'users.id')
                ->where('sala_usuario.sala_id', $sala->id_sala)
                ->select('users.id as user_id', 'users.name as nombre_usuario')
                ->get();

            $usuariosParaSala = DB::table('sala_usuario')
                ->where('sala_id', $sala->id_sala)
                ->count();

            $evaluaciones = Evaluacion::where('sala_id', $sala->id_sala)->get();

            $tablaDatos = [];
            foreach ($usuariosEnSala as $usuario) {
                foreach ($evaluaciones as $evaluacion) {
                    $registro = DB::table('evaluacion_reactivos')
                        ->where('evaluacion_id', $evaluacion->id_evaluacion)
                        ->where('user_id', $usuario->user_id)
                        ->first();

                    $aciertos = $registro ? count(json_decode($registro->acerto)) : 0;
                    $totalReactivos = $registro ? ($aciertos + count(json_decode($registro->fallo))) : 0;

                    $tablaDatos[] = [
                        'numero' => count($tablaDatos) + 1,
                        'evaluacion' => $evaluacion->tipo,
                        'usuario' => $usuario->nombre_usuario,
                        'aciertos' => $totalReactivos > 0 ? "$aciertos/$totalReactivos" : '0/0',
                        'estatus' => $registro ? 'Completado' : 'Pendiente',
                        'estatus_color' => $registro ? 'bg-success' : 'bg-warning',
                        'evaluacion_id' => $evaluacion->id_evaluacion // Añadir esta línea si es necesaria para el filtrado
                    ];
                }
            }

            return view('private.admin', compact('sala', 'tablaDatos', 'usuariosParaSala', 'evaluaciones'));
        } else {
            return redirect('/')->with('error', 'No tienes permisos para acceder a esta sección.');
        }
    }

    public function obtenerReactivos()
    {
        // Obtenemos los reactivos disponibles
        $reactivos = Reactivo::select('id_reactivos', 'reactivo', 'respuesta')->get();

        // Devolvemos los datos como JSON para manejar en el frontend
        return response()->json($reactivos);
    }
    public function crearEvaluacion(Request $request)
    {
        // Registrar la entrada a la función
        Log::info('Entrando a la función guardarEvaluacion.');

        // Validar la solicitud
        $request->validate([
            'tipoEvaluacion' => 'required|string|max:255',
            'reactivos' => 'required|array|min:10',
            'reactivos.*' => 'integer|exists:reactivos,id_reactivos',
            'sala_id' => 'required|integer|exists:sala,id_sala', // Validar que sala_id se envíe y exista en la tabla sala
        ]);

        // Obtener los datos de la solicitud
        $tipoEvaluacion = $request->input('tipoEvaluacion');
        $reactivos = $request->input('reactivos');
        $salaId = $request->input('sala_id');

        try {
            // Crear la evaluación
            $evaluacion = new Evaluacion([
                'tipo' => $tipoEvaluacion,
                'sala_id' => $salaId,
                'reactivos' => json_encode($reactivos)
            ]);
            $evaluacion->save();
            Log::info('Evaluación creada: ' . json_encode($evaluacion));

            return response()->json(['message' => 'Evaluación guardada exitosamente'], 200);
        } catch (\Exception $e) {
            Log::error('Error al guardar la evaluación: ' . $e->getMessage());

            return response()->json(['message' => 'Error al guardar la evaluación', 'error' => $e->getMessage()], 500);
        }
    }
}
