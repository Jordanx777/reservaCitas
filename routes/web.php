<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\CitasControllers;

// require base_path('routes/api.php');


// esta ruta es la que se ejecuta al iniciar el proyecto
Route::get('/', [UsuariosController::class,'Index'])->name('index');

Route::match(['get', 'post'], '/inicio', [UsuariosController::class, 'principal'])->name('Principal');

// esta ruta es para el formulario de registro
// Route::post('/usuarios', [UsuariosController::class,'Formulario'])->name('usuarios.formulario');
Route::match(['get','post'],'/usuarios', [UsuariosController::class,'Formulario'])->name('usuarios.formulario');
//esta es para registrar los datos del formulario
// Route::post('/usuarios/Registrar', [UsuariosController::class,'RegistrarU'])->name('usuarios.registrar');
Route::match(['get','post'],'/usuarios/Registrar', [UsuariosController::class,'RegistrarU'])->name('usuarios.registrar');
// esta es para la vista del login
Route::get('/Login', [UsuariosController::class,'Login_html'])->name('login_html');
// esta es para iniciar la sesion
Route::post('/Login/inicio', [UsuariosController::class,'Login'])->name('login');








// esta es para mostrar los usuarios
Route::get('/usuarios/Ver', [UsuariosController::class,'Mostrar_usuarios'])->name('Usuarios.mostrar');

// esta es para cerrar la sesion
Route::get('/Login/Cerrar', [UsuariosController::class,'Cerrar'])->name('Cerrar');

// esta espara ingresar al formulario para modificar los usuarios
Route::get('/usuarios/modificarFormulario/{id}', [UsuariosController::class,'Modificar_html'])->name('Usuarios.modificar_html');

// esta es para modificar los usuarios
Route::post('/usuarios/actualizar/{id}', [UsuariosController::class,'Actualizacion'])->name('Usuarios.modificar');

// esta es para eliminar
Route::delete('/usuarios/Eliminar/{id}', [UsuariosController::class,'Eliminar'])->name('Usuarios.eliminar');
// esta es para la vista de la landing la cual uso cuando inicia sesion
Route::get('/landing', [UsuariosController::class,'Landing'])->name('landing');
// esta es para la vista del perfil de usuarios 
Route::get('/usuarios/Perfil', [UsuariosController::class,'Perfil'])->name('Usuarios.Perfil');

Route::put('/Usuarios/perfil/actualizar/{id}',[UsuariosController::class,'Actualizar_Perfil'])->name('Usuarios.Actualizar_Perfil');

Route::get('/Usuarios/olvide', [UsuariosController::class,'Olvide_Mi_Contraseña'])->name('Usuarios.Olvide');


Route::match(['get', 'post'],'/Horarios', [HorariosController::class,'Home' ])->name('horarios.index');


Route::get('/mis-citas', [CitasControllers::class, 'Miscitas'])->name('Vercitas'); // ruta para mostrar las citas del usuario
