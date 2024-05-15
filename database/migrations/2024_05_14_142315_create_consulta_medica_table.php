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
        Schema::create('consulta_medica', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->unsignedBigInteger('id_paciente');
            $table->foreignId('id_especialidad')->constrained('especialidads')->onDelete('cascade')->onUpdate('cascade'); // Cambiar 'especialidades' por el nombre de tu tabla de especialidades
            $table->foreignId('id_consultorio')->constrained('consultorio')->onDelete('cascade')->onUpdate('cascade'); // Cambiar 'especialidades' por el nombre de tu tabla de especialidades

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta_medica');
    }
};
