<?php

use App\Http\Controllers\CategoriaRutaController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('reserva', [WelcomeController::class, 'index'])->name('reserva');
Route::post('reserva', [WelcomeController::class, 'reserva'])->name('reserva.store');
Route::get('pago', [WelcomeController::class, 'pago']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('vehiculos', VehiculoController::class);
Route::resource('categorias_rutas', CategoriaRutaController::class);






Route::resource('ruta', RutaController::class);
