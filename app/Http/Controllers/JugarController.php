<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;

class JugarController extends Controller
{

    // invitado 
    public function invitado()
    {
        return view('jugar.invitado.invitado');
    }

}
