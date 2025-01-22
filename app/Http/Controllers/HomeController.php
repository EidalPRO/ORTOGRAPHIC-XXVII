<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function home() {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function galeria()
    {
        return view('galeria');
    }
}
