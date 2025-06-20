<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CircuitoController;

Route::get('/', function () {
    return view('welcome');
});

// Si quieres una ruta especial (ejemplo)
Route::get('/circuitos/mapa', [CircuitoController::class, 'mapa']); // solo si defines ese método en el controlador

// Habilitar rutas resource para Circuito (CRUD completo)
Route::resource('circuitos', CircuitoController::class);