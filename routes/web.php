<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('reserva', [WelcomeController::class,'index'])->name('reserva');
Route::post('reserva', [WelcomeController::class,'reserva'])->name('reserva.store');
Route::get('pago', [WelcomeController::class,'pago']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
