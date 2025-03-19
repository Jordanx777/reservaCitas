<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function Index(){
        return view('index');
    }
    public function Formulario()
    {
        return view('usuarios.formulario');
    }
    public function Landing(){
        return view('landing');
    }
    public function Login_html(){
        return view('usuarios/login');
    }
    public function RegistrarU(Request $request)
    {

        // verifica que los campos no esten vacios y en el campo de correo sea tipo correo y que la contraseña verifica que sea mayor a 6 caracteres y que la confirmacion de la contraseña sea igual a la contraseña
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'edad' => 'required',
            'correo' => 'required|email',
            'contraseña' => 'required|min:6|confirmed',
        ]);

        //obtiene los valores de los campos
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $telefono = $request->input('telefono');
        $edad = $request->input('edad');
        $correo = $request->input('correo');
        $contraseña = $request->input('contraseña');
        $confirmar_contraseña = $request->input('contraseña_confirmation');

        // dump("Nombre: $nombre, Apellidos: $apellidos, Telefono: $telefono, Edad: $edad, Correo: $correo Contraseña: $contraseña, Confirmar Contraseña: $confirmar_contraseña");

        //inserta los valores en la base de datos
        $consulta = DB::table('Usuarios')->insert([
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'telefono' => $telefono,
            'edad' => $edad,
            'correo' => $correo,
            'contraseña' => Hash::make($contraseña),
            'created_at' => now(),
        ]);
        // dump($consulta);

        //si la consulta es correcta redirecciona al formulario con un mensaje
        if ($consulta) {
            return redirect()->route('usuarios.formulario')->with('mensaje', 'Usuario registrado correctamente');
        } else {
            //si la consulta es incorrecta redirecciona al formulario con un mensaje
            return redirect()->route('usuarios.formulario')->with('error', 'algo a fallado correctamente');
        }

    }
    public function Login(Request $request){
        //verifica que los campos no esten vacios y en el campo de los correos sea tipo correo
        $requerido = $request->validate([
            'correo' => 'required|email',
            'contraseña' => 'required',
        ]);
        // dump($requerido);

        //obtiene los valores de los campos en este caso correo y contraseña
        $correo = $request->input('correo');
        $contraseña = $request->input('contraseña');

        //consulta a la base de datos si el correo existe
        $consulta = DB::table('Usuarios')->where('correo', $correo)->first();
        // dump($consulta);

        //si el correo existe
        if($consulta){
            //guarda los valores de la consulta en variables de sesion
           session([
                'nombre' => $consulta->nombre,
                'apellidos' => $consulta->apellidos,
                'telefono' => $consulta->telefono,
                'edad' => $consulta->edad,
                'correo' => $consulta->correo,
                'created_at' => $consulta->created_at,
            ]);
            // verifica si la contraseña es correcta
            if(Hash::check($contraseña, $consulta->contraseña)){
                //si es correcta redirecciona a la vista landing
                return redirect()->route('landing')->with(['mensaje'=> 'Bienvenido', 'color' => 'green']);
                // si no es correcta redirecciona al login
            }else{
                return redirect()->route('login_html')->with(['mensaje'=> 'Contraseña incorrecta', 'color' => 'red']);
            }
        }else{
            //si el correo no existe redirecciona al login
            return redirect()->route('login_html')->with(['mensaje'=> 'Correo incorrecto', 'color' => 'red']);
        }

    }
    public function Cerrar(){
        //elimina todas las variables de sesion por ende la sesion
        session()->flush();
        // y redirecciona al login
        return redirect()->route('login_html')->with(['mensaje'=> 'Sesion cerrada', 'color' => 'green']);
    }
    
    
}
