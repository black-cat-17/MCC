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
        Schema::create('facultativos_autorizados', function (Blueprint $table) {
            $table->increments('ID_autorizado'); // Clave primaria AUTO_INCREMENT

            $table->unsignedInteger('ID_user'); // FK a users.ID_user
            $table->unsignedInteger('ID_facultativo'); // FK a users.ID_user o tabla separada, según tu diseño

            $table->date('fecha_alta')->nullable();
            $table->boolean('activo')->nullable()->default(1);

            // Índices (no únicos)
            $table->index('ID_user');
            $table->index('ID_facultativo');

            // Claves foráneas (opcional, si tienes relaciones definidas)
            $table->foreign('ID_user')->references('ID_user')->on('users');
            $table->foreign('ID_facultativo')->references('ID_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facultativos_autorizados');
    }
};
