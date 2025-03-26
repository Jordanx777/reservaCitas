<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UsuarioModel;

class Cargo extends Model
{
    protected $table = 'cargos'; // Nombre de la tabla en la base de datos
    protected $fillable = ['descripcion']; // Columnas que se pueden asignar de forma masiva
    public function usuarios() {
        return $this->hasMany(UsuarioModel::class, 'cargo_id', 'id');
    }
}
