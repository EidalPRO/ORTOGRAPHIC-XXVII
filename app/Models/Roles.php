<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['tipo_rol'];

    public function users()
    {
        return $this->hasMany(User::class, 'roles_id_roles', 'id_roles');
    }
}
