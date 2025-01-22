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
        Schema::create('leccion_reactivosLeccion', function (Blueprint $table) {
            $table->unsignedBigInteger('leccion_id');
            $table->unsignedBigInteger('reactivosLeccion_id');
            $table->timestamps();

            $table->primary(['leccion_id', 'reactivosLeccion_id']);
            $table->foreign('leccion_id')->references('id_leccion')->on('leccion')->onDelete('cascade');
            $table->foreign('reactivosLeccion_id')->references('id_leccion')->on('reactivosLeccion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leccion_reactivosLeccion');
    }
};
