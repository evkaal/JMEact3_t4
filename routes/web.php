<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadSangreController;

// Ruta principal que redirige al inventario
Route::get('/', function () {
    return redirect()->route('inventario.index');
});

// Rutas automáticas para todo el CRUD
Route::resource('inventario', UnidadSangreController::class);