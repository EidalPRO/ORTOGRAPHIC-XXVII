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
        Schema::create('evaluacion', function (Blueprint $table) {
            $table->id('id_evaluacion');
            $table->string('tipo', 45);
            $table->unsignedBigInteger('sala_id');
            $table->json('reactivos');
            $table->timestamps();
        
            $table->foreign('sala_id')->references('id_sala')->on('sala')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacion');
    }
};
