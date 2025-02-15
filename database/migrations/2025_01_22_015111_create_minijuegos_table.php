<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('minijuegos', function (Blueprint $table) {
            $table->id('idminijuegos');
            $table->string('nombre', 45);
            $table->timestamps();
        });

        DB::table('minijuegos')->insert([
            [
                'nombre' => 'Pasapalabras',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Escúchanos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Trivia Ortographica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('minijuegos');
    }
};
