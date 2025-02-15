<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ElevenLabsController;
use App\Http\Controllers\ElevenLabsTTSController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JugarController;
use App\Http\Controllers\PersonalizarController;
use App\Http\Controllers\SalasController;
use App\Http\Controllers\VozController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/acerca-de', [HomeController::class, 'about'])->name('about');
Route::get('/galeria', [HomeController::class, 'galeria'])->name('galeria');
Route::get('/inicio', [HomeController::class, 'home'])->name('home');


Route::middleware("guest")->group(function () {
    Route::get('/jugar/invitado', [JugarController::class, 'invitado'])->name('invitado');
    // Invitado 
    Route::get('/jugar/invitado/trivia', [JugarController::class, 'jugarInvitado']);
    // Route::get('/preguntas-sin-login', [JugarController::class, 'obtenerPreguntasInvitado']);

    // login register 
    Route::get('/registro', [AuthController::class, 'registro'])->name('registro');
    Route::get('/iniciar_sesion', [AuthController::class, 'login'])->name('login');
    Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');
    Route::post('/logear', [AuthController::class, 'logear'])->name('logear');

    // socialite facebook
    Route::get('/auth/redirect/facebook', [AuthController::class, 'redirect'])->name('facebook.redirect');
    Route::get('/auth/facebook/callback', [AuthController::class, 'callback'])->name('facebook.callback');

    // Rutas para Google
    Route::get('/auth/google/redirect', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
});

Route::middleware("auth")->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::put('/update-username', [AuthController::class, 'updateName'])->middleware('auth');

    // crear, agregar y mostrar salas 
    Route::post('/sala/create', [HomeController::class, 'createSala'])->name('sala.create');
    Route::post('/sala/agregar', [HomeController::class, 'agregarSala'])->name('sala.agregar');
    Route::get('/salas', [HomeController::class, 'getSalas'])->name('salas.get');
    Route::delete('/salir-sala/{salaId}', [HomeController::class, 'salirSala']);

    // enntrar y jugar en salas 
    Route::get('/sala/global', [SalasController::class, 'entrar'])->name('entrarGlobal');
    Route::get('/sala/global/trivia', [SalasController::class, 'mostrarTriviaGlobal'])->name('globalTrivia');
    Route::get('/sala/global/pasapalabras', [SalasController::class, 'palabrasGlobal'])->name('globalPalabras');
    Route::get('/sala/global/escribe-correctamente', [SalasController::class, 'dictadoGlobal'])->name('globalDictado');
    Route::post('/juego/guardarResultados/global', [SalasController::class, 'guardarResultadosGlobal'])->name('guardarResultadosGlobal');
    Route::get('/obtener-minijuegos', [SalasController::class, 'obtenerMinijuegos']);
    Route::get('/obtener-tabla-posiciones/{minijuegoId}', [SalasController::class, 'obtenerTablaPosiciones']);

    Route::get('/sala/personalizada/{codigo_sala}', [SalasController::class, 'privada'])->name('entrarPrivada');
    Route::get('/sala/personalizada/pasapalabras/{codigo_sala}', [SalasController::class, 'palabrasPrivada'])->name('privadaPalabras');
    Route::get('/sala/personalizada/escribe-correctamente/{codigo_sala}', [SalasController::class, 'dictadoPrivada'])->name('privadaDictado');
    Route::get('/sala/personalizada/trivia/{codigo_sala}', [SalasController::class, 'triviaPrivada'])->name('privadaTrivia');

    Route::post('/juego/guardarResultados/palabras', [SalasController::class, 'guardarResultados'])->name('guardarResultados');
    Route::post('/juego/guardarResultados/dictado', [SalasController::class, 'guardarResultadosDic'])->name('guardarResultados2');
    Route::post('/juego/guardarResultados/trivia', [SalasController::class, 'guardarResultadosTri'])->name('guardarResultados3');


    // personalizar sala 
    Route::get('/sala/{codigo_sala}/administrar', [PersonalizarController::class, 'index'])->name('panelEstadisticas');
    Route::get('/sala/pesonalizada/{codigo_sala}/evaluacion/{tipo}', [SalasController::class, 'evaluacion']);
    Route::get('/estadisticas', [PersonalizarController::class, 'index'])->name('estadisticas');
    Route::get('/crear-evaluacion', [PersonalizarController::class, 'create'])->name(name: 'crearEvaluacion');
    Route::post('/eliminar-usuario', [PersonalizarController::class, 'eliminarUsuario'])->name('eliminarUsuario');

    // evaluaciones 
    Route::get('/sala/personalizada/evaluacion/{id}/{codigoSala}', [SalasController::class, 'mostrarEvaluacion'])->name('evaluacion.mostrar');
    Route::post('/evaluacion/{id}/{sala_id}/{user_id}', [SalasController::class, 'guardarEvaluacion'])->name('evaluacion.guardar');

    Route::get('/reactivos', [PersonalizarController::class, 'obtenerReactivos'])->name('reactivos.obtener');
    Route::post('/guardar-evaluacion', [PersonalizarController::class, 'crearEvaluacion'])->name('guardarEvaluacion');

    // reportes 
    Route::get('/generar-reporte/{evaluacion}', [PersonalizarController::class, 'generarReporte'])->name('reporte.evaluacion');


    // voces
    Route::post('/generar-audio', [ElevenLabsController::class, 'convertirTexto']);
    // Route::post('/generar-audio', [VozController::class, 'convertirTexto']);
});
