<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServicioController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AdminController::class, 'bienvenido']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('redirigir', [AdminController::class, 'redirigir']);
Route::get('inicio', [AdminController::class, 'inicio']);
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::resource('mostrar_usuario', AdminController::class);
Route::get('/crear_usuario', [AdminController::class, 'crear_usuario']);
Route::post('/crear_nuevo_usuario', [AdminController::class, 'crear_nuevo_usuario']);
Route::post('/editar_Usuario/{id}', [AdminController::class, 'editar_Usuario']);
Route::delete('/borrar_Usuario/{id}', [AdminController::class, 'borrar_Usuario']);

Route::get('/mostrar_medico', [AdminController::class, 'mostrar_medico']);
Route::get('/mostrar_paciente', [AdminController::class, 'mostrar_paciente']);

Route::get('/rol', [AdminController::class, 'rol']);
Route::post('/asignar_rol', [AdminController::class, 'asignar_rol']);
Route::post('/editar_UserRol/{id}', [AdminController::class, 'editar_UserRol']);
Route::delete('/borrar_UserRol/{id}', [AdminController::class, 'borrar_UserRol']);

// Rutas de recursos para Servicios y ServicioHorarios
Route::resource('index', ServicioController::class);

Route::get('/mostrar_especialidad', [AdminController::class, 'mostrar_especialidad']);
Route::post('/crear_especialidad', [AdminController::class, 'crear_especialidad']);
Route::post('/editar_especialidad/{id}', [AdminController::class, 'editar_especialidad']);
Route::delete('/borrar_especialidad/{id}', [AdminController::class, 'borrar_especialidad']);

Route::get('/ver_esp_medico', [AdminController::class, 'ver_esp_medico']);
Route::post('/crear_esp_medico', [AdminController::class, 'crear_esp_medico']);
Route::post('/editar_esp_med/{id}', [AdminController::class, 'editar_esp_med']);
Route::post('/borrar_esp_med/{id}', [AdminController::class, 'editar_esp_med']);
Route::delete('/borrar_esp_med/{id}', [AdminController::class, 'borrar_esp_med']);


Route::get('/obtener-medicos', [AdminController::class, 'obtenerMedicos'])->name('obtener.medicos');
Route::get('/obtener-horarios', [AdminController::class, 'obtenerHorarios'])->name('obtener.horarios');



use App\Http\Controllers\HorarioController;

Route::get('/mi-horario', [HorarioController::class, 'mostrarVista'])->name('horario.mostrarVista');
Route::post('/horario', [HorarioController::class, 'store'])->name('horario.store');
Route::put('/horario/{id}', [HorarioController::class, 'update'])->name('horario.update');
Route::put('/medico-horario/{id}', [HorarioController::class, 'updateMedicoHorario'])->name('medico-horario.updateMedicoHorario');

Route::post('/turno-horario', [HorarioController::class, 'storeTurno'])->name('turno-horario.storeTurno');
Route::post('/store-medico-horario', [HorarioController::class, 'storeMedicoHorario'])->name('medico-horario.storeMedicoHorario');
Route::delete('/destroy/{id}',[HorarioController::class,'destroy'])->name('horario.destroy');


Route::delete('/medico-horario-destroy/{id}',[HorarioController::class,'destroyMedicoHorario'])->name('medico-horario.destroyMedicoHorario');
Route::delete('/destroy-turno/{id}',[HorarioController::class,'destroyTurno'])->name('turno.destroyTurno');


//agregado para las consultas
Route::post('/consultorio-horario', [HorarioController::class, 'storeConsultorio'])->name('consultorio.storeConsultorio');
Route::delete('/destroy-consultorio/{id}',[HorarioController::class,'destroyConsultorio'])->name('consultorio.destroyConsultorio');







use App\Http\Controllers\CatEquipoMedicoController;
Route::get('/cat-equipo-medico', [CatEquipoMedicoController::class, 'index'])->name('CatEquipoMedico.index');
Route::post('/catequipoM', [CatEquipoMedicoController::class, 'store'])->name('CatEquipoMedico.store');
Route::put('/catequipoM/{id}', [CatEquipoMedicoController::class, 'update'])->name('CatEquipoMedico.update');
Route::delete('/catequipoMdestroy/{id}',[CatEquipoMedicoController::class,'destroy'])->name('CatEquipoMedico.destroy');
//Route::resource('cat-equipo-medico', 'CatEquipoMedicoController');

use App\Http\Controllers\EquipoMedicoController;

Route::get('/equipo-medico', [EquipoMedicoController::class, 'index'])->name('EquipoMedico.index');
Route::post('/equipoM', [EquipoMedicoController::class, 'store'])->name('EquipoMedico.store');
Route::put('/equipoM/{id}', [EquipoMedicoController::class, 'update'])->name('EquipoMedico.update');
Route::delete('/equipoMdestroy/{id}',[EquipoMedicoController::class,'destroy'])->name('EquipoMedico.destroy');
//Route::resource('equipo-medico', 'EquipoMedicoController');


use App\Http\Controllers\ConsultaMedicaControlador;


