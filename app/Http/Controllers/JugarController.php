<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Reactivo;
use Illuminate\Http\Request;

class JugarController extends Controller
{

    // invitado 
    public function invitado()
    {
        return view('jugar.invitado.invitado');
    }

    public function jugarInvitado() {
        $reactivos = Reactivo::all()->shuffle()->take(10);
        return view('jugar.invitado.juego', compact('reactivos'));
    }

}
