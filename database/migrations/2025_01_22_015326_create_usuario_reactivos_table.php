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
        Schema::create('usuario_reactivos', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id'); // Relación con tabla users
            $table->unsignedBigInteger('reactivos_id');
            $table->timestamps();
        
            $table->primary(['user_id', 'reactivos_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reactivos_id')->references('id_reactivos')->on('reactivos')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_reactivos');
    }
};
