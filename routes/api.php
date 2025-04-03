<?php
use App\Http\Controllers\HorariosController;
use Illuminate\Support\Facades\Route;


Route::get('/horarios', [HorariosController::class, 'index']); // ruta para mostrar el inicio
Route::post('/horarios', [HorariosController::class, 'store']); // ruta para mostrar los horarios registrados 
Route::put('/horarios/Editar/{id}',[HorariosController::class,'Editar']); // ruta para editar los horarios
Route::put('/horarios/reservar/{id}', [HorariosController::class, 'Reservar']); // ruta para reservar una cita 
Route::put('/horarios/cancelar/{id}', [HorariosController::class, 'Cancelar']);// ruta para cancelar una cita 
Route::delete('/horarios/Eliminar/{id}', [HorariosController::class, 'Eliminar']); // ruta para eliminar los horarios

