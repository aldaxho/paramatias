@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/service/service.css') }}">
    <!-- CSS de Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- JS de Bootstrap (con Popper.js incluido) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@stop

@section('content')
<div class="container">
    <h1>Lista de Servicios</h1>
    <button href="{{ route('index.create') }}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addServiceModal">
        Añadir Servicio
    </button>
    <!-- Modal de Añadir Servicio -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addServiceModalLabel">Añadir Nuevo Servicio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('index.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="tipo_servicio">Tipo de Servicio</label>
                    <input type="text" class="form-control" id="tipo_servicio" name="tipo_servicio" required>
                </div>
            </div>
            <div class="form-group">
                <label for="id_medico">Medico</label>
                    <select class="text_color" name="id_medico" required="">
                        <option value="" selected>Seleccionar Medico...</option>
                            @foreach ($medico as $user)
                                <option value="{{ $user->id}}">{{ $user->id}}
                                    ...{{ $user->nombres}}</option>
                            @endforeach
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Servicio</button>
            </div>
        </form>
    </div>
</div>
</div>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Servicio</th>
                <th>Id del usarioROl </th>   <!-- tengo que modificar y que se muestre en la vista el nombre del medico y no el id de la  tabla usuarioROl -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->id }}</td>
                    <td>{{ $servicio->tipo_servicio }}</td>
                    <td>{{ $servicio->id_medico }}</td>
                    <td>
                        <button href="{{ route('index.edit', $servicio->id) }}" type="button" class="btn btn-info" data-toggle="modal" data-target="#editServiceModal-{{ $servicio->id }}">
                            Editar
                        </button>
                        <div class="modal fade" id="editServiceModal-{{ $servicio->id }}" tabindex="-1" aria-labelledby="editServiceModalLabel-{{ $servicio->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editServiceModalLabel-{{ $servicio->id }}">Editar Servicio</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('index.update', $servicio->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="tipo_servicio">Tipo de Servicio</label>
                                                <input type="text" class="form-control" id="tipo_servicio" name="tipo_servicio" value="{{ $servicio->tipo_servicio }}" required>
                                            </div>
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Actualizar Servicio</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('index.destroy', $servicio->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este servicio?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop