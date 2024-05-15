<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultaMedica extends Model
{
    use HasFactory;
    protected $table = 'consulta_medica';
    protected $fillable = [
        'fecha',
        'id_paciente',
        'id_servicios',
        'id_consultorio',
    ];
    public function consultaMedica()
    {
        return $this->belongsTo(Consultorio::class, 'id_consultorio');
    }
    public function servicios()
    {
        return $this->belongsTo(Servicio::class, 'id_servicios');
    }
    
}
