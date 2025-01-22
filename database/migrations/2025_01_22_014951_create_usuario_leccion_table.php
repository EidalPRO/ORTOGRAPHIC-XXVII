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
        Schema::create('usuario_leccion', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id'); // Relación con tabla users
            $table->unsignedBigInteger('leccion_id'); // Relación con leccion
            $table->integer('aciertos');
            $table->integer('fallados');
            $table->integer('reactivos_de_leccion');
            $table->timestamps();

            $table->primary(['user_id', 'leccion_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('leccion_id')->references('id_leccion')->on('leccion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_leccion');
    }
};
