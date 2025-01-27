<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalizarController extends Controller
{
    public function __construct()
    {
        // Middleware para verificar que el usuario esté autenticado
        $this->middleware('auth');
    }

    public function index()
    {
        // Verifica si el usuario tiene el rol y es premium
        if (auth()->user()->esPremium || in_array(auth()->user()->roles_id_roles, [2, 3])) {
            return view('panelEstadisticas'); // Redirige al panel de administración
        } else {
            return redirect('/')->with('error', 'No tienes permisos para acceder a esta sección.');
        }
    }
}
