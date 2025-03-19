<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function Formulario()
    {
        // return view('formulario');
        return view('usuarios.formulario');

    }
    public function RegistrarU(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'edad' => 'required',
            'correo' => 'required|email',
            'contraseña' => 'required|min:6|confirmed',
        ]);

        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $telefono = $request->input('telefono');
        $edad = $request->input('edad');
        $correo = $request->input('correo');
        $contraseña = $request->input('contraseña');
        $confirmar_contraseña = $request->input('contraseña_confirmation');

        dump("Nombre: $nombre, Apellidos: $apellidos, Telefono: $telefono, Edad: $edad, Correo: $correo Contraseña: $contraseña, Confirmar Contraseña: $confirmar_contraseña");

        $consulta = DB::table('Usuarios')->insert([
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'telefono' => $telefono,
            'edad' => $edad,
            'correo' => $correo,
            'contraseña' => Hash::make($contraseña),
            'created_at' => now(),
        ]);
        dump($consulta);

        if ($consulta) {
            return redirect()->route('usuarios')->with('mensaje', 'Usuario registrado correctamente');
        } else {
            return redirect()->route('usuarios')->with('error', 'algo a fallado correctamente');
        }

    }
    
}
