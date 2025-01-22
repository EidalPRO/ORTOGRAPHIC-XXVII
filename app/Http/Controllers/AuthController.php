<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function registro()
    {
        return view("auth.register");
    }
    public function login()
    {
        return view("auth.login");
    }
    public function registrar(Request $request)
    {
        $rol = $request->rol;
        if ($rol == "alumno") {
            $rolN = 1;
        } else if ($rol == "docente") {
            $rolN = 2;
        } else if ($rol == "administrador") {
            $rolN = 3;
        } else {
            $rolN = 4;
        }

        $item = new User();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = Hash::make($request->password);
        $item->roles_id_roles = $rolN;
        $item->save();
        return to_route('login');
    }

    public function logear(Request $request)
    {
        $creadenciales = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($creadenciales)) {
            return to_route('home');
        } else {
            return to_route('login');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return to_route('index');
    }
}
