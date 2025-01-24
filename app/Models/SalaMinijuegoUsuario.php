<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaMinijuegoUsuario extends Model
{
    use HasFactory;

    protected $table = 'sala_minijuegos_usuario'; // Nombre de la tabla pivot

    protected $fillable = [
        'sala_id',
        'minijuegos_id',
        'user_id',
        'progreso',
    ];

    /**
     * Relación con la tabla sala.
     */
    public function sala()
    {
        return $this->belongsTo(Sala::class, 'sala_id');
    }

    /**
     * Relación con la tabla minijuegos.
     */
    public function minijuego()
    {
        return $this->belongsTo(Minijuego::class, 'minijuegos_id');
    }

    /**
     * Relación con la tabla users.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
