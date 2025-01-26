<?php

namespace App\Http\Controllers;

use App\Models\Leccion;
use App\Models\Palabra;
use App\Models\Reactivo;
use App\Models\ReactivoLeccion;
use Illuminate\Http\Request;

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

        $reactivos = Reactivo::all()->shuffle();

        return view('jugar.global.palabras', compact('reactivos'));
    }

    public function dictadoGlobal()
    {

        $reactivos = Palabra::all()->shuffle();

        return view('jugar.global.dictado', compact('reactivos'));
    }
}
