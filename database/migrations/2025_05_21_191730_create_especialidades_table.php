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
        Schema::create('especialidades', function (Blueprint $table) {
            $table->increments('ID_especialidad'); // Primary Key AUTO_INCREMENT
            $table->string('nombre_especialidad', 100); // Nombre de la especialidad
            $table->text('descripcion')->nullable(); // Descripción opcional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialidades');
    }
};
