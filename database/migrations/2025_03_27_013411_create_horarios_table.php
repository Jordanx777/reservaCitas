<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->date('fecha'); // el siguiente campo es tipo date para la fecha
            $table->time('hora'); // el siguiente campo es tipo time para la hora
            $table->boolean('disponible')->default(true); // el siguiente campo es tipo booleano para la disponibilidad
            $table->timestamps(); // este campo es para las marcas de tiempo de creación y actualización

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
