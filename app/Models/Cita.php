<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model{
    //
    protected $table = 'citas'; // Nombre de la tabla en la base de datos
    
    protected $fillable = [
        'usuario_id',
        'horario_id',
        'estado',
    ];
    // Definición de la tabla asociada  Relaciones 

    // public function usuario(){
    //     return $this->belongsTo(User::class, 'usuario_id'); // Relación con el modelo User
    // }
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function horario()
    {
        return $this->belongsTo(Horarios::class);
    }
}
