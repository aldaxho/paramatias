<?php

namespace App\Http\Controllers;

use App\Models\EquipoMedico;
use App\Models\CatEquipoMedico;
use Illuminate\Http\Request;

class EquipoMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $EquipoM=EquipoMedico::All();
        $catEquipoM=CatEquipoMedico::All();
        return view('admin.equipo_medico.equipomedico',compact('EquipoM','catEquipoM'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'id_categoria' => 'required',

        ]);

        // Crear un nuevo horario con los datos proporcionados
        $equipoM = new EquipoMedico();
        $equipoM->nombre = $request->nombre;
        $equipoM->descripcion = $request->descripcion;
        $equipoM->id_categoria = $request->id_categoria;
        $equipoM->save();

        // Retornar una respuesta
        return redirect()->route('EquipoMedico.index')->with('success', 'equipo medico creado con éxito.');

    }

    /**
     * Display the specified resource.
     */
    public function show(EquipoMedico $equipoMedico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EquipoMedico $equipoMedico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'id_categoria' => 'required',
        ]);

        // Buscar el registro de medico_horario por su ID
        $equipoM = EquipoMedico::findOrFail($id);

        // Actualizar los campos del registro con los datos proporcionados
        $equipoM->update($request->all());

        // Redireccionar con un mensaje de éxito
        return redirect()->route('EquipoMedico.index')->with('success', 'Equipo Medico actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $equipoM =EquipoMedico::findOrFail($id);
        $equipoM->delete();
        return redirect()->route('EquipoMedico.index')->with('success', 'Equipo medico eliminado con éxito.');
    }
}
