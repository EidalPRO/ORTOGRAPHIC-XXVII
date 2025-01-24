<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReactivoLeccion extends Model
{
    use HasFactory;

    protected $table = 'reactivosLeccion';

    protected $fillable = [
        'reactivo',
        'respuesta',
        'distractor1',
        'distractor2',
        'distractor3',
        'retroalimentacion',
    ];

    public function lecciones()
    {
        return $this->belongsToMany(Leccion::class, 'leccion_reactivosLeccion');
    }
}
