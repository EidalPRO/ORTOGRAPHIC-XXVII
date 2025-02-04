<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

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
        return to_route('home');
    }

    // socualite 
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            $user = User::firstOrCreate(
                ['email' => $facebookUser->getEmail()],
                [
                    'name' => $facebookUser->getName(),
                    'email'=> $facebookUser->getEmail(),
                    'avatar' => $facebookUser->getAvatar(),
                    'roles_id_roles' => 1, 
                ]
            );

            // Autentica al usuario
            Auth::login($user);

            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Error al iniciar sesión con Facebook.');
        }
    }


    // Redirección a Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback de Google
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Busca o crea el usuario
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'avatar' => $googleUser->getAvatar(),
                'roles_id_roles' => 1,
            ]
        );

        // Autentica al usuario
        Auth::login($user);

        return redirect()->route('home');
    }
}
