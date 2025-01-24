<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reactivo extends Model
{
    use HasFactory;

    protected $table = 'reactivos';

    protected $fillable = [
        'reactivo',
        'respuesta',
        'distractor1',
        'distractor2',
        'distractor3',
        'retroalimentacion',
    ];

    public function evaluaciones()
    {
        return $this->belongsToMany(Evaluacion::class, 'evaluacion_reactivos')
            ->withPivot(['user_id', 'fallo']);
    }
}
