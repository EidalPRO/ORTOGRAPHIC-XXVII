<?php

namespace App\Http\Controllers;

use App\Models\Leccion;
use App\Models\Palabra;
use App\Models\Reactivo;
use App\Models\ReactivoLeccion;
use App\Models\Sala;
use App\Models\SalaMinijuegoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalasController extends Controller
{
    public function entrar()
    {
        return view('salas.global');
    }

    public function leccionesGlobal()
    {
        $lecciones = Leccion::all();
        return view('jugar.global.trivia', compact('lecciones'));
    }

    public function mostrarTrivia($leccion_id)
    {
        $leccion = Leccion::with('reactivos')->find($leccion_id);

        return view('jugar.global.tjuego', compact('leccion'));
    }

    public function palabrasGlobal()
    {

        $reactivos = Reactivo::all()->shuffle()->take(10);

        return view('jugar.global.palabras', compact('reactivos'));
    }

    public function dictadoGlobal()
    {

        $reactivos = Palabra::all()->shuffle();

        return view('jugar.global.dictado', compact('reactivos'));
    }


    //  SALAS PRVADAS 

    public function privada($codigo_sala)
    {
        $sala = Sala::where('codigo_sala', $codigo_sala)->first();

        return view('salas.privada', compact('sala'));
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
        $reactivos = Palabra::all()->shuffle();
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
}
