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
           /* height: 100vh; /* Altura total de la ventana */
        }
        .font_size{
            text-align: center; 
            font-size: 35px;  
            font-weight: bold;

        }
        .text_color{
            color: black;
            width: 350px; /* Ancho de los campos de entrada */
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .div_design{
            padding-bottom: 15px;
        }
    </style>
     <h1 class="font_size">REGISTRAR ALUMNO</h1>  
     <div style="text-align: center;">
         <div style="color: white; display: inline-block;">
             <a class="btn btn-info" href="{{url('mostrar_alumno')}}">
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
        
           
            <div class="div_center">
                <form action="{{url('/crear_estudiante')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label class="text-align:center;">Cedula de Identidad</label>
                        <input class="text_color" type="number" min="0" name="CI" 
                            placeholder="Escribe tu cedula de identidad" required="">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Nombre</label>
                        <input class="text_color" type="text" name="Nombre" 
                            placeholder="Escribe tu nombre" required="">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Apellido Paterno</label>
                        <input class="text_color" type="text" name="ApellidoPaterno" 
                            placeholder="Escribe tu apellido paterno" required="">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Apellido Materno</label>
                        <input class="text_color" type="text" name="ApellidoMaterno" 
                            placeholder="Escribe tu apellido materno" required="">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Sexo</label>
                        <input class="text_color" type="text" name="Sexo" 
                            placeholder="" required="">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Direccion</label>
                        <input class="text_color" type="text" name="Direccion" 
                            placeholder="Escribe tu direccion" required="">
                    </div>
                    
                    <div class="div_design">
                        <label class="text-align:center;">Fecha de nacimiento</label>
                        <input class="text_color" type="date" name="FechaNacimiento" 
                            placeholder="Escribe tu fecha de nacimiento" required="">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Fecha de registro</label>
                        <input class="text_color" type="date" name="FechaRegistro" 
                            placeholder="Escribe tu fecha de registro" required="">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Correo electrónico</label>
                        <input class="text_color" type="email" name="Correo" 
                            placeholder="Escribe tu correo" required="">
                    </div>
                
                    <div class="div_design">
                        <input type="submit" value="Registrar Alumno" class="btn btn-primary">                        
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>

@stop

