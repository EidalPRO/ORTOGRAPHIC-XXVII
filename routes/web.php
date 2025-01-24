<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JugarController;
use App\Http\Controllers\SalasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/acerca-de', [HomeController::class, 'about'])->name('about');
Route::get('/galeria', [HomeController::class, 'galeria'])->name('galeria');


Route::middleware("guest")->group(function () {
    Route::get('/jugar/invitado', [JugarController::class, 'invitado'])->name('invitado');
    // Invitado 
    // Route::get('/jugar/invitado/trivia', [JugarController::class, 'jugarInvitado']);
    // Route::get('/preguntas-sin-login', [JugarController::class, 'obtenerPreguntasInvitado']);
    
    // login register 
    Route::get('/registro', [AuthController::class, 'registro'])->name('registro');
    Route::get('/iniciar_sesion', [AuthController::class, 'login'])->name('login');
    Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');
    Route::post('/logear', [AuthController::class, 'logear'])->name('logear');
});

Route::middleware("auth")->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/sala-global', [SalasController::class, 'entrar'])->name('entrarGlobal');
    Route::get('/sala-global/lecciones', [SalasController::class, 'leccionesGlobal'])->name('globalLecciones');
    Route::get('/sala-glonal/lecciones/trivia/{id_leccion}', [SalasController::class, 'mostrarTrivia'])->name('trivia');
    Route::get('/sala-global/pasapalabras', [SalasController::class, 'palabrasGlobal'])->name('globalPalabras');
});
