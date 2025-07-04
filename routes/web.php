<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PredioController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta especifica para el mapa
Route::get('/clientes/mapa', [ClienteController::class, 'mapa']);

// Rutas del CRUD
Route::resource('clientes', ClienteController::class);

// Habilitando el uso de rutas para el CRUD de Predios
Route::resource('predios', PredioController::class);
