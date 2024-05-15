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
    @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
    <h1>Lista de Usuarios</h1>
    <button href="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCrear">
       {{-- {{ route('index.create') }} --}}
        Crear Usuario
    </button>

    @include('admin.usuario.modalCrear')

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th class="th_deg" scope="col">ID</th>
                <th class="th_deg" scope="col">CI</th>
                <th class="th_deg" scope="col">Nombre</th>
                <th class="th_deg" scope="col">Apellido Paterno</th>
                <th class="th_deg" scope="col">Apellido Materno</th>
                <th class="th_deg" scope="col">Sexo</th>
                <th class="th_deg" scope="col">Telefono</th> 
                <th class="th_deg" scope="col">Direccion</th> 
                <th class="th_deg" scope="col">Correo</th>
                <th class="th_degA" scope="col">Actualizar</th>
                <th class="th_degA" scope="col">Eliminar</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($usuario as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->ci}}</td>
                <td>{{$user->nombres}}</td>
                <td>{{$user->apellido_paterno}}</td>
                <td>{{$user->apellido_materno}}</td>
                <td>{{$user->sexo}}</td> 
                <td>{{$user->telefono}}</td>
                <td>{{$user->direccion}}</td>
                <td>{{$user->email}}</td>
                <td>
                        <button href="{{url('editar_Usuario', $user->id)}}" type="button" 
                                class="btn btn-warning" data-toggle="modal"
                                data-target="#modalEditarUser-{{ $user->id }}" 
                                >                           
                            Editar
                        </button>

                        @include('admin.usuario.modalEditar')

                                 
                    
                </td>  
                <td>
                    <form action="{{ url('borrar_Usuario', $user->id) }}" method="POST"
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