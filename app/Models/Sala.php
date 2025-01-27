<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $table = 'sala';

    protected $fillable = ['codigo_sala', 'nombre', 'user_id'];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'sala_usuario');
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function minijuegos()
    {
        return $this->belongsToMany(Minijuego::class, 'sala_minijuegos_usuario')
            ->withPivot(['user_id', 'acerto', 'fallo']); // Campos adicionales

    }
    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class, 'sala_id');
    }
}
