<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use App\Notifications\CitaConfirmada;
use App\Models\Cita; // Asegúrate de importar el modelo correcto

class CitasControllers extends Controller{
    //
    public function ComfirmarCita(Request $request){
        
        $cita = Cita::findOrFail($request->id); // Buscar la cita por su ID
        $cita ->estado = 'confirmada'; // Cambiar el estado a confirmada
        $cita->save(); // Guardar los cambios en la base de datos
        // Enviar la notificación al usuario

        $usuario = $cita->usuario; // Obtener el usuario asociado a la cita
        $usuario->notify(new Cita($cita)); // Enviar la notificación
        return response()->json(['mensaje' => 'Cita confirmada y notificación enviada'], 200); // Retornar respuesta exitosa
    }

        public function Miscitas(){

            $usuario_id = session("id"); // Guardar el id del usuario en la sesion
    
            $citas = \App\Models\Cita::with('horario') // Obtener la cita con el horario
            ->where('usuario_id', $usuario_id) // Filtrar por el id del usuario
            ->get();// Obtener todas las citas del usuario
    
            // return response()->json($citas); // Retornar las citas del usuario
    
            return view('citas.mis_citas', compact('citas')); // Retornar la vista de las citas del usuario
        }
    
    
}
