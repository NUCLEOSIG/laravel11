<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\SuscriptorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('categorias',  CategoriaController::class);
    Route::resource('notificaciones',  NotificacionController::class);
    Route::resource('mensajes',  MensajeController::class);
    Route::resource('suscriptores',  SuscriptorController::class);

    Route::resource('logs',  LogsController::class);
});
