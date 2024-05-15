<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servicio;
use App\Models\Users;

class Servicio extends Model
{
    use HasFactory;
    protected $table = 'servicios';  // Especifica el nombre de la tabla si no sigue las convenciones de Laravel
    public $timestamps = false; 
    protected $fillable = ['id', 'tipo_servicio','id_medico'];  // Atributos que pueden ser asignados masivamente

    // public function servicioHorarios()
    // {
    //     return $this->hasMany(ServicioHorario::class, 'id_servicio');
    // }
    public function medico()
    {
        return $this->belongsTo(User::class, 'id_medico', 'id');
    }

}
