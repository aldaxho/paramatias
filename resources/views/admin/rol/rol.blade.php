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
    @if (session()->has('message'))
        <div class="alert alert-success">
                        <button type="button" class="close"
                                data-dismiss="alert" aria-hidden="true">
                            X
                        </button>
                            {{session()->get('message')}}
        </div>
    @endif
    <h1>Lista de Roles</h1>
    <button href="" type="button" class="btn btn-primary" 
            data-toggle="modal" data-target="#addServiceModal">
        Asignar rol
    </button>

    @include('admin.rol.modalCrear')

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
             @foreach($usuario_rol as $usuario_rol)
                <tr>
                    <td>{{ $usuario_rol->id}}</td>
                    <td>
                        {{ $usuario_rol->user->nombres }}
                        {{ $usuario_rol->user->apellido_paterno }}
                    </td>
                    <td>{{ $usuario_rol->rol->rol }}</td>
                    <td>
                        <button href="{{url('editar_UserRol', $usuario_rol->id)}}" type="button" 
                                class="btn btn-warning" data-toggle="modal"
                                data-target="#editServiceModal-{{ $usuario_rol->id }}" 
                                >                           
                            Editar
                        </button>

                        @include('admin.rol.modalEditar')

                        <form action="{{ url('borrar_UserRol', $usuario_rol->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar?')">
                                Eliminar
                            </button>
                        </form>
                        
                    
                    </td> 
                </tr>
            @endforeach 
        </tbody>
    </table>
</div>

@stop