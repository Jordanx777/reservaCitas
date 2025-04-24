<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Cargo;

class UsuarioModel extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre', 'apellidos', 'telefono', 
        'edad', 'correo', 'contraseña', 
        'cargo_id', 'created_at', 'updated_at'
    ];

    protected $hidden = ['contraseña'];
    public function cargo() {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id'); 
    }
}
