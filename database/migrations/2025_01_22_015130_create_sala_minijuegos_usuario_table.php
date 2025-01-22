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
        Schema::create('sala_minijuegos_usuario', function (Blueprint $table) {
            $table->unsignedBigInteger('sala_id');
            $table->unsignedBigInteger('minijuegos_id');
            $table->unsignedBigInteger('user_id'); // Relación con tabla users
            $table->integer('progreso');
            $table->timestamps();
        
            $table->primary(['sala_id', 'minijuegos_id', 'user_id']);
            $table->foreign('sala_id')->references('id_sala')->on('sala')->onDelete('cascade');
            $table->foreign('minijuegos_id')->references('idminijuegos')->on('minijuegos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sala_minijuegos_usuario');
    }
};
