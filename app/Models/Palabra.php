<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palabra extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'palabras';

    // Clave primaria personalizada
    protected $primaryKey = 'id_palabra';

    // Indicar que no tiene timestamps (created_at y updated_at)
    public $timestamps = false;

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'palabra',
        'retroalimentacion',
    ];
}
