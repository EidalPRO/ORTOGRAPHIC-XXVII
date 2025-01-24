<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'esPremium',
        'roles_id_roles',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function role()
    {
        return $this->belongsTo(Roles::class, 'roles_id_roles', 'id_roles');
    }

    public function lecciones()
    {
        return $this->belongsToMany(Leccion::class, 'usuario_leccion')
            ->withPivot(['aciertos', 'fallados', 'reactivos_de_leccion']);
    }

    public function salas()
    {
        return $this->belongsToMany(Sala::class, 'sala_usuario');
    }

    public function minijuegos()
    {
        return $this->belongsToMany(Minijuego::class, 'sala_minijuegos_usuario')
            ->withPivot('progreso');
    }
}
