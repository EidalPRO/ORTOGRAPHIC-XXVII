<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JugarController;
use App\Http\Controllers\PersonalizarController;
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

    // socialite 
    Route::get('/auth/redirect/facebook', [AuthController::class, 'redirect'])->name('facebook.redirect');
    Route::get('/auth/callback/facebook', [AuthController::class, 'callback'])->name('facebook.callback');
});

Route::middleware("auth")->group(function () {
    Route::get('/inicio', [HomeController::class, 'home'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // crear, agregar y mostrar salas 
    Route::post('/sala/create', [HomeController::class, 'createSala'])->name('sala.create');
    Route::post('/sala/agregar', [HomeController::class, 'agregarSala'])->name('sala.agregar');
    Route::get('/salas', [HomeController::class, 'getSalas'])->name('salas.get');

    // enntrar y jugar en salas 
    Route::get('/sala/global', [SalasController::class, 'entrar'])->name('entrarGlobal');
    Route::get('/sala/global/lecciones', [SalasController::class, 'leccionesGlobal'])->name('globalLecciones');
    Route::get('/sala/glonal/lecciones/trivia/{id_leccion}', [SalasController::class, 'mostrarTrivia'])->name('trivia');
    Route::get('/sala/global/pasapalabras', [SalasController::class, 'palabrasGlobal'])->name('globalPalabras');
    Route::get('/sala/global/escribe-correctamente', [SalasController::class, 'dictadoGlobal'])->name('globalDictado');

    Route::get('/sala/personalizada/{codigo_sala}', [SalasController::class, 'privada'])->name('entrarPrivada');
    Route::get('/sala/personalizada/pasapalabras/{codigo_sala}', [SalasController::class, 'palabrasPrivada'])->name('privadaPalabras');
    Route::get('/sala/personalizada/escribe-correctamente/{codigo_sala}', [SalasController::class, 'dictadoPrivada'])->name('privadaDictado');

    Route::post('/juego/guardarResultados/palabras', [SalasController::class, 'guardarResultados'])->name('guardarResultados');
    Route::post('/juego/guardarResultados/dictado', [SalasController::class, 'guardarResultadosDic'])->name('guardarResultados2');



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
});
