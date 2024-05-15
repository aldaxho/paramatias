<?php

namespace App\Http\Controllers;

use App\Models\CatEquipoMedico;
use App\Models\EquipoMedico;
use Illuminate\Http\Request;



class CatEquipoMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catEquipoM=CatEquipoMedico::All();
        $EquipoM=EquipoMedico::All();
        return view('admin.equipo_medico.equipomedico',compact('catEquipoM','EquipoM'));
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
    
        ]);

        // Crear un nuevo horario con los datos proporcionados
        $catequi = new CatEquipoMedico();
        $catequi->nombre = $request->nombre;
        $catequi->descripcion = $request->descripcion;
        $catequi->save();

        // Retornar una respuesta
        return redirect()->route('CatEquipoMedico.index')->with('success', 'categoria de equipo creado con éxito.');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(CatEquipoMedico $catEquipoMedico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatEquipoMedico $catEquipoMedico)
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
    ]);

    // Buscar el registro de medico_horario por su ID
    $catequipoM = CatEquipoMedico::findOrFail($id);

    // Actualizar los campos del registro con los datos proporcionados
    $catequipoM->update($request->all());

    // Redireccionar con un mensaje de éxito
    return redirect()->route('CatEquipoMedico.index')->with('success', 'Equipo Medico- actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $catequipoM = CatEquipoMedico::findOrFail($id);
        $catequipoM->delete();
        return redirect()->route('CatEquipoMedico.index')->with('success', 'Categoria de equipo medico eliminado con éxito.');
    }
}
