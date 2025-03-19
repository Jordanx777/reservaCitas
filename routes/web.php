<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

// esta ruta es la que se ejecuta al iniciar el proyecto
Route::get('/', [UsuariosController::class,'Index'])->name('index');
// esta ruta es para el formulario de registro
Route::post('/usuarios', [UsuariosController::class,'Formulario'])->name('usuarios.formulario');
//esta es para registrar los datos del formulario
Route::post('/usuarios/Registrar', [UsuariosController::class,'RegistrarU'])->name('usuarios.registrar');
// esta es para la vista de la landing la cual uso cuando inicia sesion
Route::get('/landing', [UsuariosController::class,'Landing'])->name('landing');
// esta es para la vista del login
Route::get('/Login', [UsuariosController::class,'Login_html'])->name('login_html');
// esta es para iniciar la sesion
Route::post('/Login/inicio', [UsuariosController::class,'Login'])->name('login');
// esta es para cerrar la sesion
Route::get('/Login/Cerrar', [UsuariosController::class,'Cerrar'])->name('Cerrar');