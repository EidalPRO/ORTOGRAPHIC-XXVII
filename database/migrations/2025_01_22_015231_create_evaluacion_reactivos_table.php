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
        Schema::create('evaluacion_reactivos', function (Blueprint $table) {
            $table->unsignedBigInteger('evaluacion_id');
            $table->unsignedBigInteger('sala_id');
            $table->unsignedBigInteger('user_id'); // Relación con tabla users
            $table->json('acerto')->nullable();
            $table->json('fallo')->nullable();
            

            $table->timestamps();

            $table->foreign('evaluacion_id')->references('id_evaluacion')->on('evaluacion')->onDelete('cascade');
            $table->foreign('sala_id')->references('id_sala')->on('sala')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacion_reactivos');
    }
};
