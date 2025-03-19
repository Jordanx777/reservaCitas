<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

Route::get('/', function () {
    return view('index');
});
Route::get('/usuarios', [UsuariosController::class,'Formulario'])->name('usuarios');
Route::post('/usuarios/Registrar', [UsuariosController::class,'RegistrarU'])->name('usuarios.registrar');