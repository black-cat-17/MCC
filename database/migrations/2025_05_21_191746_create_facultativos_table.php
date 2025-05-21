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
        Schema::create('facultativos', function (Blueprint $table) {
            $table->increments('ID_facultativo'); // Primary Key AUTO_INCREMENT

            $table->unsignedInteger('ID_user')->nullable(); // Relación a users
            $table->unsignedInteger('ID_especialidad')->nullable(); // Relación a especialidades

            // Índices (no únicos)
            $table->index('ID_user');
            $table->index('ID_especialidad');

            // Foreign Keys opcionales
            $table->foreign('ID_user')->references('ID_user')->on('users')->onDelete('set null');
            $table->foreign('ID_especialidad')->references('ID_especialidad')->on('especialidades')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facultativos');
    }
};
