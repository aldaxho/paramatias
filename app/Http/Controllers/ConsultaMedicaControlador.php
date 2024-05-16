<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultaMedica;
use Illuminate\Support\Facades\Auth;
use App\Models\Consultorio;
use App\Models\Horario;
use App\Models\EquipoMedico;
use App\Models\Servicio;
use Illuminate\Support\Facades\DB;


class ConsultaMedicaControlador extends Controller
{
    private $horarioId;
    
    public function guardarCita(Request $request)
    {
        //dd($request->all());
        
        try {
            // Tu código actual para guardar la cita aquí
            // Obtener los datos enviados desde JavaScript
            $this->horarioId = $request->input('horarioId');
            //$horarioId = $request->input('horarioId');
            //$metodoPago = $request->input('metodoPago');
            $fecha = $request->input('fecha');
            $idPaciente = Auth::id(); // Obtener el ID del paciente logueado
            $idEspecialidad = $request->input('idEspecialidad');
            $idMedico = $request->input('idmedico');

            
            $consultorioId = DB::table('consultorio')
            ->select('id')
            ->where('id_medico', $idMedico)
            ->first();
            // Insertar los datos en la tabla consulta_medica
            ConsultaMedica::create([
                'fecha' => $fecha,
                'id_paciente' => $idPaciente,
                'id_especialidad' => $idEspecialidad,
                'id_consultorio' => $consultorioId,
                //'horario_id' => $horarioId,
            // 'metodo_pago' => $metodoPago,
                // Agregar otros campos si es necesario
            ]);

            // Puedes devolver una respuesta JSON indicando el éxito o cualquier otro mensaje necesario
            return response()->json(['message' => 'Cita guardada correctamente']);
        } catch (\Exception $e) {
            // Log the exception
            \Log::error('Error al guardar la cita: ' . $e->getMessage());
            
            // Devolver una respuesta JSON con el mensaje de error
            return response()->json(['error' => 'Error al guardar la cita: ' . $e->getMessage()], 500);
        }
    }
    public function obtenerConsultaMedica()
    {
         // Obtener el ID del paciente logueado
             $idPaciente = Auth::id();
            $consulta = DB::table('consulta_medica')
            ->join('users', 'consulta_medica.id_paciente', '=', 'users.id')
            ->join('especialidads', 'consulta_medica.id_especialidad', '=', 'especialidads.id')
            ->leftJoin('consultorio', 'consulta_medica.id_consultorio', '=', 'consultorio.id')
            ->select('consulta_medica.id', 'consulta_medica.fecha', 'users.nombres as nombre_usuario', 'especialidads.nombre as nombre_especialidad', 'consultorio.nombre as nombre_consultorio')
            ->where('consulta_medica.id_paciente', $idPaciente)
            ->get();
              // Realizar la consulta para obtener los datos del horario y el nombre del turno asociado
            $horario = DB::table('horarios')
            ->join('turnos', 'horarios.id_turno', '=', 'turnos.id')
            ->select('horarios.horaI', 'horarios.horaF', 'horarios.dia', 'turnos.nombre as nombre_turno')
            ->where('horarios.id', $this->horarioId)
            ->first();

               // Combinar los resultados de ambas consultas en un solo objeto
        $resultado = [
            'consulta' => $consulta,
            'horario' => $horario,
        ];

        return response()->json($resultado);
    }

    public function mostrar_vista (){
        
        $consultas=Consultorio::All();
        $consultamedicas=ConsultaMedica::All();
        return view('paciente.inicio',compact('consultas','consultamedicas'));
    }


}
