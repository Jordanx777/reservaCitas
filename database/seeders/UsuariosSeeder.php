<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UsuarioModel;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsuarioModel::insert([
        [
        "nombre" => "Camilo el boquilla ",
        "apellidos" => "Marrugo Barrios",
        "telefono" => "3000000000",
        "edad" => "19",
        "correo"=> "camilo@gmail.com",
        "contraseña" => hash::make("camilo"),
        "cargo_id" => 1,
        "created_at" => now(),
        "updated_at" => null
        ],

        [
        "nombre" => "Luis flower of camp",
        "apellidos" => "Hernandez ",
        "telefono" => "3000000000",
        "edad" => "21",
        "correo"=> "luis@gmail.com",
        "contraseña" => Hash::make("123456"),
        "cargo_id" => 1,
        "created_at" => now(),
        "updated_at" => null
        ],

        [
        "nombre" => "Jordano el toto",
        "apellidos" => "Vinasco Aparicio",
        "telefono" => "3000000000",
        "edad" => "20",
        "correo"=> "jordano@gmail.com",
        "contraseña" => hash::make("jordano"),
        "cargo_id" => 1,
        "created_at" => now(),
        "updated_at" => null
        ],
    [
        "nombre" => "Samuel Elias el señor de la noche",
        "apellidos" => "Polo Polo",
        "telefono" => "3000000000",
        "edad" => "20",
        "correo"=> "samuel@gmail.com",
        "contraseña" => hash::make("samuel"),
        "cargo_id" => 1,
        "created_at" => now(),
        "updated_at" => null
    ],
    [
        "nombre" => "luis daniel el misterioso",
        "apellidos" => "Zaens ",
        "telefono" => "3000000000",
        "edad" => "19",
        "correo"=> "luisdaniel@gmail.com",
        "contraseña" => hash::make("123456"),
        "cargo_id" => 1,
        "created_at" => now(),
        "updated_at" => null
    ],
]);

    }
    
}
