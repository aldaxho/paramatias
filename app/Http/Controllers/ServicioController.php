<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\UsuarioRol;
use App\Models\User;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    public function index()
    {
        // Recuperar todos los servicios
        $servicios = Servicio::all();
        $usuario = User::all();
        $medico = UsuarioRol::where('rol_id', 2)->get(); 
        // Pasar la variable 'servicios' a la vista
        return view( 'admin.servicio.inicio', compact('servicios','medico','usuario'));
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
    // Validar los datos de entrada
    $request->validate([
        'tipo_servicio' => 'required|string|max:250'
    ]);

    // Obtener el próximo ID
    $nextId = Servicio::max('id') + 1;

    // Crear el nuevo servicio
    $servicio = new Servicio([
        'id' => $nextId,  // Solo si realmente necesitas 
                          // asignarlo manualmente
        'tipo_servicio' => $request->tipo_servicio,
        'id_medico' => $request->id_medico,
    ]);

    // Guardar el nuevo servicio en la base de datos
    $servicio->save();

    // Redirigir al índice con un mensaje de éxito
    return redirect()->route('index.index')->with('success', 'Servicio creado con éxito.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $servicio = Servicio::findOrFail($id);
    return view('index.edit', compact('servicio'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'tipo_servicio' => 'required|string|max:250',
        'id_medico' => 'required|integer'
    ]);

    $servicio = Servicio::findOrFail($id);
    $servicio->update($request->all());

    return redirect()->route('index.index')->with('success', 'Servicio actualizado con éxito.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();
        return redirect()->route('index.index')->with('success', 'Servicio eliminado con éxito.');
    }
    
}