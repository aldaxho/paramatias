<x-app-layout>
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

   
   
   
   <div class="container">
    
      <h1>Medicos</h1>
     
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
              <tr>
                  <td>primero</td>
              </tr>
          </tbody>
      </table>
  </div>
  
</x-app-layout>