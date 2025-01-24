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
        Schema::create('leccion', function (Blueprint $table) {
            $table->id('id_leccion');
            $table->string('nombre', 255);
            $table->string('tema', 45);
            $table->timestamps();
        });

        DB::table('leccion')->insert([
            [
                'nombre' => 'Uso correcto de las mayúsculas y minúsculas en oraciones y textos',
                'tema' => 'Ortografía básica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Reglas de acentuación, agudas, graves y esdrújulas',
                'tema' => 'Acentuación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Reglas ortográficas del uso de V y B, LL y Y, C, S y Z',
                'tema' => 'Ortografía avanzada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Reglas de uso de la R y la RR',
                'tema' => 'Ortografía avanzada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Uso de los signos de puntuación como el punto, la coma, los dos puntos, el punto y coma, etc.',
                'tema' => 'Puntuación',
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
        Schema::dropIfExists('leccion');
    }
};
