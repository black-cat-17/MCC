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
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('ID_documento'); // Clave primaria AUTO_INCREMENT
            $table->unsignedInteger('ID_user'); // Relación a users (usuario asociado al documento)
            $table->string('observacion', 150); // Observaciones del documento
            $table->string('archivo_url', 150); // URL del archivo
            $table->date('fecha_alta'); // Fecha de alta del documento

            // Índices
            $table->index('ID_user'); // Índice para la columna 'ID_user'

            // Clave foránea para 'ID_user'
            $table->foreign('ID_user')->references('ID_user')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
