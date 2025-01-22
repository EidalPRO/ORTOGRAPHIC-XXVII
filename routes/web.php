<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JugarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [HomeController::class, 'index']);
Route::get('/acerca-de', [HomeController::class, 'about'])->name('about');
Route::get('/galeria', [HomeController::class, 'galeria'])->name('galeria');

// Invitado 
Route::get('/jugar/invitado', [JugarController::class, 'invitado'])->name('invitado');
// Route::get('/jugar/invitado/trivia', [JugarController::class, 'jugarInvitado']);
// Route::get('/preguntas-sin-login', [JugarController::class, 'obtenerPreguntasInvitado']);

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/registro', [AuthController::class, 'registro'])->name('registro');
Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');
