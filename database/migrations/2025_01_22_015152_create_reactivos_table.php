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
        Schema::create('reactivos', function (Blueprint $table) {
            $table->id('id_reactivos');
            $table->string('reactivo', 255);
            $table->string('respuesta', 45);
            $table->string('distractor1', 45);
            $table->string('distractor2', 45);
            $table->string('distractor3', 45);
            $table->string('retroalimentacion', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reactivos');
    }
};
