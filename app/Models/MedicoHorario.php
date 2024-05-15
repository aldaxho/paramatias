<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicoHorario extends Model
{
    use HasFactory;
    protected $table = 'medico_horarios';
    protected $fillable = [
        'id_horario',
        'id_medico',
        'id_especialidades'
    ];
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_medico');
    }

    public function especialidades()
    {
        return $this->belongsTo(Especialidad::class, 'id_especialidades');
    }

}
