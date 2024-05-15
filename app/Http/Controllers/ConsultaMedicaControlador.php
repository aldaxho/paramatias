<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultaMedica;

use App\Models\Consultorio;
use App\Models\Horario;
use App\Models\EquipoMedico;
use App\Models\Servicio;

class ConsultaMedicaControlador extends Controller
{
    public function mostrar_vista (){
        
        $consultas=Consultorio::All();
        $consultamedicas=ConsultaMedica::All();
        return view('paciente.inicio',compact('consultas','consultamedicas'));
    }


}
