<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minijuego extends Model
{
    use HasFactory;

    protected $table = 'minijuegos';

    protected $fillable = ['nombre'];

    public function salas()
    {
        return $this->belongsToMany(Sala::class, 'sala_minijuegos_usuario')
            ->withPivot(['user_id', 'acerto', 'fallo']); // Campos adicionales de la tabla intermedia
    }
}
