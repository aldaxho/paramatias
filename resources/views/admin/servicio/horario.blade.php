@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')

@stop
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Horarios</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inicio/css/horario.css') }}" rel="stylesheet">

@section('content')
   

<div class="container mt-5">
    <h1 class="mb-4">CRUD de Horarios</h1>
    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearTurnoModal">
        Añadir Turno
    </button>
    <!-- Botón para abrir modal de creación -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#crearModal">
        Crear Horario
    </button>
    <!-- Botón para agregar medico con su horario -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#crearmedicohorarioModal">Agregar un Horario-medico</button>

    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#crearConsultorioModal">
        Crear Consultorios
    </button>

    @if (session('success'))
    <div class="alert alert-success">
         {{ session('success') }}
    </div>
   @endif

   <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Listado de los consultorios</div>

            <div class="card-body">
                <!-- Tabla de turno -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Nombre del medico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultorios as $consultorio)
                        <tr>
                            <td>{{ $consultorio->id }}</td>
                            <td>{{ $consultorio->nombre }}</td>
                            <td>{{ $consultorio->medico->nombres }} </td>


                            <td>
                                <!-- Aquí puedes colocar los botones de acciones, por ejemplo: -->
                            
                                <form action="{{ route('consultorio.destroyConsultorio', $consultorio->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este consultorio?')">Eliminar</button>
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
<!-- modal de creacion de consultorio -->
    <dv class="modal fade" id="crearConsultorioModal" tabindex="-1" role="dialog" aria-labelledby="crearConsultorioModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crearConsultorioModalLabel">Crear Horario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Contenido del formulario de creación aquí -->
            <form id="crearForm"action="{{ route('consultorio.storeConsultorio') }}" method="POST">
            @csrf
                
                <div class="form-group">
                    <label for="nombre">Nombre del Consultorio:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="form-group">
                    <label for="id_medico">Médico:</label>
                    <select class="form-control" id="id_medico" name="id_medico">
                        <!-- Aquí se llenará dinámicamente con los médicos disponibles -->
                        @foreach ($medicos as $usuarioMedico)
                           
                            <option value="{{ $usuarioMedico->usuario_id }}">{{ $usuarioMedico->user->ci }} - {{ $usuarioMedico->user->nombres }} - {{ $usuarioMedico->user->apellido_paterno }} - {{ $usuarioMedico->user->apellido_materno }}</option>

                        @endforeach 
                    </select>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                
            </form>
        </div>
        
    </div>
</div>
</dv>




   <div class="container">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Listado de Médico-Horarios</div>

            <div class="card-body">
                

                <!-- Tabla de médico-horarios -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Médico</th>
                            <th>Horario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicoHorarios as $medicoHorario)
                        <tr>
                            <td>{{ $medicoHorario->id }}</td>
                            <td>
                           <!--      aquilisto -->
                                
                            {{ $medicoHorario->user->nombres }} - {{ $medicoHorario->user->apellido_paterno }} - {{ $medicoHorario->user->apellido_materno }}
                        </td>
                        <td>{{ $medicoHorario->horario->horaI }} - {{ $medicoHorario->horario->horaF }}

                        </td>


                            <td>{{ $medicoHorario->horario->horaI }} - {{ $medicoHorario->horario->horaF }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarModal{{ $medicoHorario->id }}">Editar</button>
                                <div class="modal fade" id="editarModal{{ $medicoHorario->id }}" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel{{ $medicoHorario->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editarModalLabel{{ $medicoHorario->id }}">Editar Médico-Horario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Formulario para editar médico-horario -->
                                                <form action="{{ route('medico-horario.updateMedicoHorario', $medicoHorario->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="id_medico{{ $medicoHorario->id }}">Médico:</label>
                                                        <select class="form-control" id="id_medico{{ $medicoHorario->id }}" name="id_medico">
                                                            @foreach ($medicos as $medico)
                                                            <option value="{{ $medico->id }}" {{ $medico->id == $medicoHorario->id_medico ? 'selected' : '' }}>{{ $medico->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_horario{{ $medicoHorario->id }}">Horario:</label>
                                                        <select class="form-control" id="id_horario{{ $medicoHorario->id }}" name="id_horario">
                                                            @foreach ($horarios as $horario)
                                                            <option value="{{ $horario->id }}" {{ $horario->id == $medicoHorario->id_horario ? 'selected' : '' }}>{{ $horario->horaI }} - {{ $horario->horaF }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('medico-horario.destroyMedicoHorario', $medicoHorario->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este médico-horario?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Listado de los turnos</div>

            <div class="card-body">
                <!-- Tabla de turno -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Turno</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($turnos as $turno)
                        <tr>
                            <td>{{ $turno->id }}</td>
                            <td>{{ $turno->nombre }}</td>
                            <td>
                                <!-- Aquí puedes colocar los botones de acciones, por ejemplo: -->
                            
                                <form action="{{ route('turno.destroyTurno', $turno->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este turno?')">Eliminar</button>
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Listado de los horarios</div>

            <div class="card-body">
                <!-- Tabla de horarios -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hora de Inicio</th>
                            <th>Hora de Fin</th>
                            <th>Día</th>
                            <th>Turno</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($horarios as $horario)
                    <tr>
                    <td>{{ $horario->id }}</td>
                    <td>{{ $horario->horaI }}</td>
                    <td>{{ $horario->horaF }}</td>
                    <td>{{ $horario->dia }}</td>
                    <td>{{ $horario->turno->nombre }}</td>
                    <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarModal{{ $horario->id }}">Editar</button>
                    <div class="modal fade" id="editarModal{{ $horario->id }}" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel{{ $horario->id }}" aria-hidden="true">   
                    <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="crearModalLabel">editar Horario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Contenido del formulario de creación aquí -->
                                    <form id="crearForm"action="{{ route('horario.update','$horario->id') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                        <div class="form-group">
                                            <label for="horaI">Hora de Inicio:</label>
                                            <input type="time" class="form-control" id="horaI" name="horaI">
                                        </div>
                                        <div class="form-group">
                                            <label for="horaF">Hora de Fin:</label>
                                            <input type="time" class="form-control" id="horaF" name="horaF">
                                        </div>
                                    <div class="form-group">
                                            <label for="dia">Día:</label>
                                            <input type="text" class="form-control" id="dia" name="dia">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_turno">Turno:</label>
                                            <select class="form-control" id="id_turno" name="id_turno">
                                                @foreach ($turnos as $turno)
                                                    <option value="{{ $turno->id }}">{{ $turno->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                        
                                    </form>
                                </div>
                                
                            </div>
                        </div>

                    </div>

                    <form action="{{ route('horario.destroy', $horario->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este horario?')">Eliminar</button>
                    </form>
                    </td>
                    
                    </tr>
                    
                    @endforeach
                
                        <!-- Aquí se llenará dinámicamente con datos -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#crearmedicohorarioModal">Agregar un Horario-medico</button> -->
<!-- Modal de creación -->
<div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crearModalLabel">Crear Horario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Contenido del formulario de creación aquí -->
            <form id="crearForm"action="{{ route('horario.store') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="horaI">Hora de Inicio:</label>
                    <input type="time" class="form-control" id="horaI" name="horaI">
                </div>
                <div class="form-group">
                    <label for="horaF">Hora de Fin:</label>
                    <input type="time" class="form-control" id="horaF" name="horaF">
                </div>
                <div class="form-group">
                    <label for="dia">Día:</label>
                    <input type="text" class="form-control" id="dia" name="dia">
                </div>
                <div class="form-group">
                                <label for="id_turno">Turno:</label>
                                <select class="form-control" id="id_turno" name="id_turno">
                                    @foreach ($turnos as $turno)
                                        <option value="{{ $turno->id }}">{{ $turno->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                
            </form>
        </div>
        
    </div>
</div>
</div>
<!-- Modal de creación de medico-horario -->
<div class="modal fade" id="crearmedicohorarioModal" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crearModalLabel">Agregar Horario-medico</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Formulario para agregar un nuevo horario-medico -->
            <form id="crearForm" action="{{ route('medico-horario.storeMedicoHorario') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="id_horario">Horario:</label>
                    <select class="form-control" id="id_horario" name="id_horario">
                        <!-- Aquí se llenará dinámicamente con los horarios disponibles -->
                        @foreach ($horarios as $horario)
                        <option value="{{ $horario->id }}">{{ $horario->turno->nombre }} - {{ $horario->horaI }} - {{ $horario->horaF }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="id_especialidades">Especialidades:</label>
                    <select class="form-control" id="id_especialidades" name="id_especialidades">
                        <!-- Aquí se llenará dinámicamente con los horarios disponibles -->
                        @foreach ($especialidades as $especialidad)
                        <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_medico">Médico:</label>
                    <select class="form-control" id="id_medico" name="id_medico">
                        <!-- Aquí se llenará dinámicamente con los médicos disponibles -->
                        @foreach ($medicos as $usuarioMedico)
                           
                            <option value="{{ $usuarioMedico->usuario_id }}">{{ $usuarioMedico->user->ci }} - {{ $usuarioMedico->user->nombres }} - {{ $usuarioMedico->user->apellido_paterno }} - {{ $usuarioMedico->user->apellido_materno }}</option>

                        @endforeach 
                    </select>
                </div>
<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
            </form>
        </div>
      
    </div>
</div>
</div>

<!-- Modal para añadir un turno -->
<div class="modal fade" id="crearTurnoModal" tabindex="-1" role="dialog" aria-labelledby="crearTurnoModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crearTurnoModalLabel">Añadir Turno</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Formulario para añadir un turno -->
            <form id="crearTurnoForm"action="{{ route('turno-horario.storeTurno') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" onclick="guardarTurno()">Guardar</button>
        </div>
                <!-- Otros campos del turno aquí, si es necesario -->
            </form>
        </div>
        
    </div>
</div>
<script>
    function guardarTurno() {
var formData = $('#crearTurnoForm').serialize();

$.ajax({
    type: 'POST',
    url: '{{ route("horario.store") }}',
    data: formData,
    success: function(response) {
        // Mostrar una alerta de éxito
        alert('Turno creado exitosamente');

        // Opcional: Limpiar el formulario o realizar otras acciones necesarias
        $('#crearTurnoForm')[0].reset();
    },
    error: function(xhr, status, error) {
        // Mostrar una alerta de error
        alert('Error al agregar el turno: ' + error);
    }
});
}

</script>
</div>
<!-- Modal de creación -->

<!-- <div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true"> -->

<!-- Modal de edición -->




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // JavaScript para manejar interacciones y eventos
</script>




@stop