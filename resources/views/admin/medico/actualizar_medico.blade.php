@extends('adminlte::page')
@section('title', 'agenda-escolar')

@section('content_header')
    <style type="text/css">
        .div_center{
            text-align: center;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 110vh; /* Altura total de la ventana */
        }
        .font_size{
            text-align: center; 
            font-size: 35px;  
            font-weight: bold; /* Ajuste de la posición vertical */
        }
        .text_color{
            color: black;
            width: 350px; /* Ancho de los campos de entrada */
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            width: 180px;
        }
        .div_design{
            padding-bottom: 15px;
        }
    </style>
    <p class="font_size">Actualizar Profesor</p>
    <div style="text-align: center;">
        <div style="color: white; display: inline-block;">
            <a class="btn btn-primary" href="{{url('mostrar_profesor')}}">
                 regresar</a>
        </div>
    </div>
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            @if (session()->has('message'))
                <div class="alert alert-success">
                                <button type="button" class="close"
                                          data-dismiss="alert" aria-hidden="true">
                                       X
                                  </button>
                                      {{session()->get('message')}}
                             </div>
            @endif


            {{-- <p class="font_size">CREAR PROFESOR</p>    --}}
            <div class="div_center">
                <form action="{{url('/confirmar_profesor', $buscar->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="div_design">
                        <label class="text-align:center;">Cedula de Identidad</label>
                        <input class="text_color" type="number" min="0" name="CI" 
                            placeholder="Escribe tu cedula de identidad" required=""
                            value="{{$buscar->CI}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Nombre</label>
                        <input class="text_color" type="text" name="Nombre" 
                            placeholder="Escribe tu nombre" required=""
                            value="{{$buscar->Nombre}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Apellido Paterno</label>
                        <input class="text_color" type="text" name="ApellidoPaterno" 
                            placeholder="Escribe tu apellido paterno" required=""
                            value="{{$buscar->ApellidoPaterno}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Apellido Materno</label>
                        <input class="text_color" type="text" name="ApellidoMaterno" 
                            placeholder="Escribe tu apellido materno" required=""
                            value="{{$buscar->ApellidoMaterno}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Direccion</label>
                        <input class="text_color" type="text" name="Direccion" 
                            placeholder="Escribe tu direccion" required=""
                            value="{{$buscar->Direccion}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Telefono</label>
                        <input class="text_color" type="number" min="0" name="Telefono" 
                            placeholder="Escribe tu numero de telefono" required=""
                            value="{{$buscar->Telefono}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Fecha de nacimiento</label>
                        <input class="text_color" type="date" name="FechaNacimiento" 
                            placeholder="Escribe tu fecha de nacimiento" required=""
                            value="{{$buscar->FechaNacimiento}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Fecha de registro</label>
                        <input class="text_color" type="date" name="FechaRegistro" 
                            placeholder="Escribe tu fecha de registro" required=""
                            value="{{$buscar->FechaRegistro}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Correo electrónico</label>
                        <input class="text_color" type="email" name="Correo" 
                            placeholder="Escribe tu correo" required=""
                            value="{{$buscar->Correo}}">
                    </div>                                             
                    <div class="div_design">
                        <input type="submit" value="Actualizar Profesor" class="btn btn-primary">                        
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>

@stop

