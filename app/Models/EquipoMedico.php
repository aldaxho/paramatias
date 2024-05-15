<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoMedico extends Model
{
    use HasFactory;
    protected $table = 'equipo_medico';
    protected $fillable = [
        'nombre',
        'descripcion',
        'id_categoria',
    ];
    public function catequipomedico()
    {
        return $this->belongsTo(Turno::class, 'id_categoria');
    }
}
