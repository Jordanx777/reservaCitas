<?php
use App\Http\Controllers\HorariosController;
use Illuminate\Support\Facades\Route;

// dd('El archivo api.php está siendo cargado correctamente');
// use App\Http\Controllers\HorariosController;


// Route::get('/horarios', [HorariosController::class, 'index']);
// Route::post('/horarios', [HorariosController::class, 'store']);
// Route::put('/horarios/reservar/{id}', [HorariosController::class, 'Reservar']);
// Route::put('/horarios/cancelar/{id}', [HorariosController::class, 'Cancelar']);

Route::get('/horarios', [HorariosController::class, 'index']);
Route::post('/horarios', [HorariosController::class, 'store']);
Route::put('/horarios/Editar/{id}',[HorariosController::class,'Editar']);
Route::put('/horarios/reservar/{id}', [HorariosController::class, 'Reservar']);
Route::put('/horarios/cancelar/{id}', [HorariosController::class, 'Cancelar']);

