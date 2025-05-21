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
        Schema::create('enlaces', function (Blueprint $table) {
            $table->increments('ID_enlace'); // Clave primaria AUTO_INCREMENT
            $table->unsignedInteger('ID_user')->nullable(); // Relación a users
            $table->string('nombre_url', 100)->nullable(); // Nombre de la URL
            $table->text('ruta_enlace'); // Ruta del enlace (obligatoria)
            $table->text('observacion_url')->nullable(); // Observaciones opcionales
            $table->date('fecha_alta'); // Fecha de alta (obligatoria)

            // Índices
            $table->index('ID_user'); // Índice para 'ID_user'

            // Si necesitas una clave foránea, descomenta la siguiente línea
            $table->foreign('ID_user')->references('ID_user')->on('users')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enlaces');
    }
};
