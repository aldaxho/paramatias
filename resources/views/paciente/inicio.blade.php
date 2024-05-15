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

    <div>
        <!-- Botón "Solicitar Cita" -->
        <button id="solicitarCitaBtn" class="btn btn-primary">Solicitar Cita</button>

        <!-- Formulario de reserva de cita (inicialmente oculto) -->
        <div id="formularioCita" style="display: none;">
            <h2>Reserva de Cita</h2>
            <!-- Tabla de Especialidades -->
            <div id="tablaEspecialidades">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre de la Especialidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($especialidades as $especialidad)
                            <tr>
                                <td>{{ $especialidad->id }}</td>
                                <td>{{ $especialidad->nombre }}</td>
                                <td>
                                    <button class="btn btn-primary mostrarServiciosBtn" data-especialidad-id="{{ $especialidad->id }}">Mostrar Servicios</button>
                                    <button class="btn btn-success seleccionarBtn" data-especialidad-id="{{ $especialidad->id }}">Seleccionar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Tabla de Médicos (inicialmente oculta) -->
            <div id="tablaMedicos" style="display: none;">
                <h2>Medicos</h2>
                <button class="btn btn-primary volverBtn">Volver</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre del Médico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicos as $medico)
                            <tr>
                                <td>{{ $medico->id }}</td>
                                <td>{{ $medico->nombre }}</td>
                                <td>
                                    <button class="btn btn-success seleccionarHoraBtn" data-medico-id="{{ $medico->id }}">Seleccionar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
<!-- Modal para mostrar los servicios -->
<div class="modal fade" id="modalServicios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Servicios para la Especialidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí se mostrarán los servicios -->
                <ul id="listaServicios"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div id="tablaHorarios" style="display: none;">
    <h2>Horarios Disponibles</h2>
    <!-- Aquí puedes agregar la tabla de horarios disponibles -->
    <button class="btn btn-primary volverMedicosBtn">Volver a Médicos</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Dia</th>
                            <th>Hora de Incio</th>
                            <th>Hora de Finalizacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($horarios as $horario)
                            <tr>
                                <td>{{ $horario->id }}</td>
                                <td>{{ $horario->dia }}</td>
                                <td>{{ $horario->horaI }}</td>
                                <td>{{ $horario->horaF }}</td>

                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
</div>
<script>
    // Escuchar el evento 'click' en el botón Seleccionar (para mostrar los horarios disponibles)
    document.querySelectorAll('.seleccionarHoraBtn').forEach(btn => {
        btn.addEventListener('click', () => {
            // Obtener el ID del médico asociado al botón
            const medicoId = btn.dataset.medicoId;

            // Aquí podrías hacer lo necesario para mostrar los horarios disponibles en función del médico seleccionado
            console.log('Mostrar Horarios Disponibles para el Médico ID:', medicoId);

            // Ejemplo: Mostrar tabla de horarios disponibles (aquí puedes ajustar según tus necesidades)
            $('#tablaMedicos').hide(); // Ocultar tabla de médicos
            $('#tablaHorarios').show(); // Mostrar tabla de horarios
        });
        document.querySelector('.volverMedicosBtn').addEventListener('click', () => {
        // Ocultar la tabla de horarios y mostrar la tabla de médicos nuevamente
        $('#tablaHorarios').hide(); // Ocultar tabla de horarios
        $('#tablaMedicos').show(); // Mostrar tabla de médicos
    });
    });
</script>



<script>
    // Escuchar el evento 'click' en el botón Mostrar Servicios
    document.querySelectorAll('.mostrarServiciosBtn').forEach(btn => {
        btn.addEventListener('click', () => {
            // Obtener el ID de la especialidad asociada al botón
            const especialidadId = btn.dataset.especialidadId;

            // Aquí podrías hacer lo necesario para mostrar los servicios en el modal
            console.log('Mostrar Servicios para la Especialidad ID:', especialidadId);

            // Ejemplo: Mostrar servicios en el modal
            const listaServicios = document.getElementById('listaServicios');
            listaServicios.innerHTML = ''; // Limpiar lista anterior
            listaServicios.innerHTML = '<li>Servicio 1</li><li>Servicio 2</li>'; // Ejemplo de servicios
            $('#modalServicios').modal('show'); // Mostrar modal
        });
    });
</script>
    <script>
        // Obtener referencia al botón y al formulario
        const solicitarCitaBtn = document.getElementById('solicitarCitaBtn');
        const formularioCita = document.getElementById('formularioCita');
        const tablaEspecialidades = document.getElementById('tablaEspecialidades');
        const tablaMedicos = document.getElementById('tablaMedicos');
        const volverBtn = document.querySelector('.volverBtn');
        
        // Escuchar el evento 'click' en el botón de Solicitar Cita
        solicitarCitaBtn.addEventListener('click', () => {
            // Si el formulario está oculto, lo mostramos. Si está visible, lo ocultamos.
            if (formularioCita.style.display === 'none') {
                formularioCita.style.display = 'block';
            } else {
                formularioCita.style.display = 'none';
            }
        });

      

        // Escuchar el evento 'click' en el botón Seleccionar
        document.querySelectorAll('.seleccionarBtn').forEach(btn => {
            btn.addEventListener('click', () => {
                // Aquí podrías hacer lo necesario para mostrar los médicos
                console.log('Mostrar Médicos para la Especialidad ID:', btn.dataset.especialidadId);
                tablaEspecialidades.style.display = 'none';
                tablaMedicos.style.display = 'block';
            });
        });

        // Escuchar el evento 'click' en el botón Volver
        volverBtn.addEventListener('click', () => {
            tablaEspecialidades.style.display = 'block';
            tablaMedicos.style.display = 'none';
        });
    </script>
</x-app-layout>
