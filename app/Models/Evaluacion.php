<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = 'evaluacion';
    protected $primaryKey = 'id_evaluacion';
    protected $fillable = ['tipo', 'sala_id', 'reactivos'];

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'sala_id'); // Relación con sala
    }
    public function reactivos()
    {
        return $this->belongsToMany(Reactivo::class, 'evaluacion_reactivos', 'evaluacion_id', 'reactivo_id')
            ->withPivot('user_id', 'fallo'); // Si necesitas esos valores adicionales en la tabla pivote
    }
}
