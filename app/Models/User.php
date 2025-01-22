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

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function salas()
    {
        return $this->hasMany(Sala::class, 'user_id');
    }

    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class, 'usuario_id');
    }

    public function premios()
    {
        return $this->belongsToMany(Premio::class, 'premios_usuario', 'user_id', 'premio_id')
            ->withPivot('estado', 'fecha_desbloqueo')
            ->withTimestamps();
    }

    public function progreso()
    {
        return $this->hasMany(Progreso::class, 'user_id');
    }
}
