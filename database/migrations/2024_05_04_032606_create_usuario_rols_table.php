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
        Schema::create('usuario_rols', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->unsignedBigInteger('rol_id')->nullable();
            $table->foreign('usuario_id')->references('id')->on('users')
            ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('rol_id')->references('id')->on('rols')
            ->cascadeOnUpdate()->cascadeOnDelete();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_rols');
    }
};
