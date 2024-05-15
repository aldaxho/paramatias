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
    
    <h1>Lista de Medicos</h1>
   
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
            </tr>
        </thead>
        <tbody>
            @foreach ($medico as $usuarioMedico)
            <tr>
                <td>{{$usuarioMedico->user->id}}</td>
                <td>{{$usuarioMedico->user->ci}}</td>
                <td>{{$usuarioMedico->user->nombres}}</td>
                <td>{{$usuarioMedico->user->apellido_paterno}}</td>
                <td>{{$usuarioMedico->user->apellido_materno}}</td>
                <td>{{$usuarioMedico->user->sexo}}</td>
                <td>{{$usuarioMedico->user->telefono}}</td>
                <td>{{$usuarioMedico->user->direccion}}</td>
                <td>{{$usuarioMedico->user->email}}</td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>

@stop