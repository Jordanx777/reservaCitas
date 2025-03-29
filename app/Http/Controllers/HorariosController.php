<?php

namespace App\Http\Controllers;

use App\Models\Horarios;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // Asegurar esta línea

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Home(){ // Vista de los horarios
        return view('horarios.Index'); // retorna la vista de los horarios
    }

     // Listar los horarios disponibles
    public function index(){ // Listar los horarios
        // return response()->json(Horarios::where('disponible', true)->get()); // Retorna los horarios disponibles
        return response()->json(Horarios::all()); // Retorna todos los horarios
    }

    /**
     * Store a newly created resource in storage.
     */

     // Agregar un nuevo horario
    public function store(Request $request) // Agregar un nuevo horario
    {
        // Validar los datos
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|',
        ]); // validar los datos
        // Crear un nuevo horario
        $horario = Horarios::create($request->all());
        // Retornar el horario creado
        return response()->json($horario, 201);
        //
    }

    public function Reservar($id){ // Reservar un horario
        // Buscar el horario
        $horario = Horarios::find($id);

        // Verificar si el horario existe
        if (!$horario->disponible) {
            // Retornar un mensaje de error
            return response()->json(['message' => 'El horario ya fue reservado'], 400);

            # code...
        }
        // Cambiar el estado del horario
        $horario->disponible = false;
        // Guardar los cambios
        $horario->save();
        // // Retornar el horario modificado
        return response()->json(['mensaje' => 'El horario reservado es', 'horario' => $horario], 200);


    }

    public function Cancelar($id){ // Cancelar un horario
        // Buscar el horario
        $horario = Horarios::find($id);
        // Verificar si el horario existe
        $horario->disponible = true;
        // Guardar los cambios
        $horario->save();
        // Retornar el horario modificado
        return response()->json(['mensaje' => 'El horario cancelado es', 'horario' => $horario], 200);

    }
}
