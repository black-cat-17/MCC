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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('ID_user'); // Primary key AUTO_INCREMENT
            $table->string('nombre', 50);
            $table->string('apellidos', 100)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('email', 100)->unique(); // Índice único
            $table->string('password', 255);
            $table->enum('tipo_user', ['paciente', 'facultativo', 'admin']);
            $table->date('fecha_alta')->nullable();
            $table->boolean('activo')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
