<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rol;

class UsuarioRol extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'id');
    }

}
