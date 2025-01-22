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
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id_roles');
            $table->string('tipo_rol', 45);
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['tipo_rol' => 'alumno', 'created_at' => now(), 'updated_at' => now()],
            ['tipo_rol' => 'docente', 'created_at' => now(), 'updated_at' => now()],
            ['tipo_rol' => 'administrador', 'created_at' => now(), 'updated_at' => now()],
            ['tipo_rol' => 'invitado', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
