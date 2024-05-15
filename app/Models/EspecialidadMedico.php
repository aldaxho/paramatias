<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Especialidad;

class EspecialidadMedico extends Model
{
    use HasFactory;
    protected $table = 'especialidad_medicos';
    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'especialidad_id',
        
    ];
    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'especialidad_id', 'id');
    }
    
}
