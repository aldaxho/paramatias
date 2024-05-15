<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Turno;
use App\Models\MedicoHorario;
use App\Models\UsuarioRol;
use App\Models\Especialidad;
use App\Models\Consultorio;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
{
    public function mostrarVista()
    {
        $turnos = Turno::all();
        $horarios =Horario::all();
        $medicoHorarios = MedicoHorario::all();
        $medicos = UsuarioRol::where('rol_id', 2)->get(); 
        $especialidades=Especialidad::all();
        $user = User::all();
        $userol = UsuarioRol::all();
        $consultorios=Consultorio::All();
        return view('admin.servicio.horario',compact('horarios','turnos','medicoHorarios',
        'medicos','user','userol','especialidades','consultorios'));
    }

    public function mostrar_medico(){
        $medico = UsuarioRol::where('rol_id', 2)->get(); 
        return view('admin.medico.mostrar_medico', ['medico' => $medico]);
    }

    public function storeTurno(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
    
        ]);

        // Crear un nuevo horario con los datos proporcionados
        $turno = new Turno();
        $turno->nombre = $request->nombre;
        $turno->save();

        // Retornar una respuesta
        return redirect()->route('horario.mostrarVista')->with('success', 'Turno creado con éxito.');

        
    }
    public function storeConsultorio(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'id_medico' => 'required',
        ]);

        // Crear un nuevo registro de medico_horario con los datos proporcionados
        Consultorio::create($request->all());

        // Redireccionar con un mensaje de éxito
        return redirect()->route('horario.mostrarVista')->with('success', 'Consultorio creado exitosamente.');
       // return redirect()->route('medico-horario.index')->with('success', 'Medico-Horario creado exitosamente.');
    }


    public function storeMedicoHorario(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'id_horario' => 'required',
            'id_medico' => 'required',
        ]);

        // Crear un nuevo registro de medico_horario con los datos proporcionados
        MedicoHorario::create($request->all());

        // Redireccionar con un mensaje de éxito
        return redirect()->route('horario.mostrarVista')->with('success', 'Medico-Horario creado exitosamente.');
       // return redirect()->route('medico-horario.index')->with('success', 'Medico-Horario creado exitosamente.');
    }


    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'horaI' => 'required',
            'horaF' => 'required',
            'dia' => 'required',
            'id_turno' => 'required'
        ]);

        // Crear un nuevo horario con los datos proporcionados
        $horario = new Horario();
        $horario->horaI = $request->horaI;
        $horario->horaF = $request->horaF;
        $horario->dia = $request->dia;
        $horario->id_turno = $request->id_turno;
        $horario->save();

        // Retornar una respuesta
        return redirect()->route('horario.mostrarVista')->with('success', 'Horario creado con éxito.');
       // return response()->json(['message' => 'Horario creado exitosamente'], 201);

    }
    public function update(Request $request, $id)
    {
        
        // Validar los datos del formulario
        $request->validate([
            'horaI' => 'required',
            'horaF' => 'required',
            'dia' => 'required',
            'id_turno' => 'required'
        ]);
        $horario = Horario::findOrFail($id);

        if (!$horario) {
            return response()->json(['message' => 'Horario no encontrado'], 404);
        }
        // Encontrar el horario a actualizar
        

        // Actualizar los datos del horario
        $horario->horaI = $request->horaI;
        $horario->horaF = $request->horaF;
        $horario->dia = $request->dia;
        $horario->id_turno = $request->id_turno;
        $horario->save();

        // Retornar una respuesta
        return redirect()->route('horario.mostrarVista')->with('success', 'Horario actualizado exitosamente');
        //return response()->json(['message' => 'Horario actualizado exitosamente'], 200);
    }


    public function updateMedicoHorario(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'id_horario' => 'required',
            'id_medico' => 'required',
        ]);

        // Buscar el registro de medico_horario por su ID
        $medicoHorario = MedicoHorario::findOrFail($id);

        // Actualizar los campos del registro con los datos proporcionados
        $medicoHorario->update($request->all());

        // Redireccionar con un mensaje de éxito
        return redirect()->route('horario.mostrarVista')->with('success', 'Medico-Horario actualizado correctamente.');
    }

    public function destroyTurno($id)
    {
        $turno = Turno::findOrFail($id);
        $turno->delete();
        return redirect()->route('horario.mostrarVista')->with('success', 'Turno eliminado con éxito.');
    }

    public function destroyMedicoHorario($id)
    {
        // Buscar el registro de medico_horario por su ID y eliminarlo
        $medicoHorario = MedicoHorario::findOrFail($id);
        $medicoHorario->delete();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('horario.mostrarVista')->with('success', 'Medico-Horario eliminado correctamente.');
    }

    public function destroyConsultorio($id)
    {
        $consultorios = Consultorio::findOrFail($id);
        $consultorios->delete();
        return redirect()->route('horario.mostrarVista')->with('success', 'Consultorio eliminado con éxito.');
    }

    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();
        return redirect()->route('horario.mostrarVista')->with('success', 'horario eliminado con éxito.');
    }
   
}
