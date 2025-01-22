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
        $item = new User();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = Hash::make($request->password);
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
