<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leccion extends Model
{
    use HasFactory;

    protected $table = 'leccion';

    protected $fillable = ['nombre', 'tema'];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'usuario_leccion')
            ->withPivot(['aciertos', 'fallados', 'reactivos_de_leccion']);
    }

    public function reactivos()
    {
        return $this->belongsToMany(ReactivoLeccion::class, 'leccion_reactivosLeccion');
    }
}
