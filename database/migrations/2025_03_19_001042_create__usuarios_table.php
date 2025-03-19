<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('Usuarios', function (Blueprint $table) {
            $table->id(); // Auto-incremental
            $table->text('nombre');
            $table->text('apellidos');
            $table->text('telefono');
            $table->text('edad');
            $table->text('correo');
            $table->text('contraseña');
            $table->timestamps(); // Crea las columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
