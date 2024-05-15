<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    use HasFactory;
    protected $table = 'consultorio';
    protected $fillable = [
        'nombre',
        'id_medico',
    ];
   // En tu modelo Consultorio
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
