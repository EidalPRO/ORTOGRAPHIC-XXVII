<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionReactivo extends Model
{
    use HasFactory;

    protected $table = 'evaluacion_reactivos'; // Nombre de la tabla pivot

    protected $fillable = [
        'evaluacion_id',
        'reactivos_id',
        'sala_id',
        'user_id',
        'acerto',
        'fallo',
    ];

    /**
     * Relación con la tabla evaluacion.
     */
    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'evaluacion_id');
    }

    /**
     * Relación con la tabla reactivos.
     */
    public function reactivo()
    {
        return $this->belongsTo(Reactivo::class, 'reactivos_id');
    }

    /**
     * Relación con la tabla sala.
     */
    public function sala()
    {
        return $this->belongsTo(Sala::class, 'sala_id');
    }

    /**
     * Relación con la tabla users.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
