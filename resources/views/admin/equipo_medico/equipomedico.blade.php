<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inicio/css/horario.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
 <!-- //////////////////////crud de la categoria equipo de medico/////////////////////////////////////////////// -->   
 @if (session('success'))
    <div class="alert alert-success">
         {{ session('success') }}
    </div>
   @endif
 <div class="container">
        <h2>Catálogo de Equipo Médico</h2>

        <!-- Botón para abrir el modal de creación -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
            Crear Catálogo
        </button>

        <!-- Tabla para mostrar los catálogos existentes -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se mostrarán los registros de cat_equipo_medico -->
                @foreach ($catEquipoM as $catEquipos)
            <tr>
                <td>{{ $catEquipos->id }}</td>
                <td>{{ $catEquipos->nombre }}</td>
                <td>{{ $catEquipos->descripcion }}</td>
                <td>
                    <!-- Aquí puedes colocar los botones de acciones, por ejemplo: -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarcatEquiposModal{{ $catEquipos->id }}">Editar</button>

                    <div class="modal fade" id="editarcatEquiposModal{{ $catEquipos->id }}" tabindex="-1" role="dialog" aria-labelledby="editarcatEquiposModalLabel{{ $catEquipos->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editarcatEquiposModalLabel{{ $catEquipos->id }}">Editar Médico-Horario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Formulario para editar médico-horario -->
                                                <form action="{{ route('CatEquipoMedico.update', $catEquipos->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre del Catalogo:</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombre">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="descripcion">Descripcion del Catalogo:</label>
                                                        <input type="text" class="form-control" id="descripcion" name="descripcion">
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


                    <form action="{{ route('CatEquipoMedico.destroy', $catEquipos->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este turno?')">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Modal para crear un nuevo catálogo -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Crear Catálogo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí va el formulario para crear un nuevo catálogo -->
                <form id="createForm"action="{{ route('CatEquipoMedico.store') }}" method="POST">
                @csrf
                    <!-- Campos del formulario -->
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" >Guardar</button>
            </div>
                    <!-- Fin de los campos del formulario -->
                </form>
            </div>
           
        </div>
    </div>
</div>

        <!-- Modal para editar un catálogo existente -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <!-- Contenido del modal -->
        </div>

        <!-- Modal para confirmar la eliminación de un catálogo -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <!-- Contenido del modal -->
        </div>
    </div>









<!-- //////////////////////crud del equipo de medico/////////////////////////////////////////////// -->

<div class="container">
        <h2>Equipo Médico</h2>

        <!-- Botón para abrir el modal de creación -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createequipoMModal">
            Registrar equipo Medico a una categoria
        </button>

        <!-- Tabla para mostrar los catálogos existentes -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se mostrarán los registros de cat_equipo_medico -->
                @foreach ($EquipoM as $Equipos)
            <tr>
                <td>{{ $Equipos->id }}</td>
                <td>{{ $Equipos->nombre }}</td>
                <td>{{ $Equipos->descripcion }}</td>
            
                <td>{{ $Equipos->id_categoria}}</td>

                <td>
                    <!-- Aquí puedes colocar los botones de acciones, por ejemplo: -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarEquiposModal{{ $Equipos->id }}">Editar</button>

                    <div class="modal fade" id="editarEquiposModal{{ $Equipos->id }}" tabindex="-1" role="dialog" aria-labelledby="editarEquiposModalLabel{{ $Equipos->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editarEquiposModalLabel{{ $Equipos->id }}">Editar Médico-Horario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Formulario para editar médico-horario -->
                                                <form action="{{ route('EquipoMedico.update', $Equipos->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre del Equipo Medico:</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombre">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="descripcion">Descripcion del equipo:</label>
                                                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_categoria">eleccion de categoria:</label>
                                                        <select class="form-control" id="id_categoria" name="id_categoria">
                                                            @foreach ($catEquipoM as $catEquipos)
                                                                <option value="{{ $catEquipos->id }}">{{ $catEquipos->nombre }}</option>
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


                    <form action="{{ route('EquipoMedico.destroy', $Equipos->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este turno?')">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Modal para crear un nuevo catálogo -->
<div class="modal fade" id="createequipoMModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Crear Catálogo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí va el formulario para crear un nuevo catálogo -->
                <form id="createForm"action="{{ route('EquipoMedico.store') }}" method="POST">
                @csrf
                    <!-- Campos del formulario -->
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                    <div class="form-group">
                                                        <label for="id_categoria">eleccion de categoria:</label>
                                                        <select class="form-control" id="id_categoria" name="id_categoria">
                                                            @foreach ($catEquipoM as $catEquipos)
                                                                <option value="{{ $catEquipos->id }}">{{ $catEquipos->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" >Guardar</button>
            </div>
                    <!-- Fin de los campos del formulario -->
                </form>
            </div>
           
        </div>
    </div>
</div>

        <!-- Modal para editar un catálogo existente -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <!-- Contenido del modal -->
        </div>

        <!-- Modal para confirmar la eliminación de un catálogo -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <!-- Contenido del modal -->
        </div>
    </div>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>