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
        Schema::create('medico_horarios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_horario')->constrained('horarios')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_medico');
            
            $table->foreignId('id_especialidades')->constrained('especialidads')->onDelete('cascade')->onUpdate('cascade'); // Cambiar 'especialidades' por el nombre de tu tabla de especialidades


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medico_horarios');
    }
};
