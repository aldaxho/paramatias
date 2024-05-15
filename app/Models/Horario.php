<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $table = 'horarios';
    protected $fillable = [
        'horaI',
        'horaF',
        'dia',
        'id_turno',
    ];
    public function turno()
    {
        return $this->belongsTo(Turno::class, 'id_turno');
    }
}
