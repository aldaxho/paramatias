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
            
            <!-- Tabla de Especialidades -->
            <div id="tablaEspecialidades">
                <table class="table">
                <h2>Reserva de Cita</h2>
                    <thead>
                        <tr>
                            
                            <th>Nombre de la Especialidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($especialidades as $especialidad)
                            <tr>
                                
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
                            
                            <th>Nombre del Médico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id= "tbodyMedicos">
                        
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
                    <tbody id="tbodyHorarios" >
                        
                    </tbody>
                </table>
</div>

<!-- Botones para elegir método de pago (inicialmente ocultos) -->
<div id="metodosPago" style="display: none;">
    <h3>Elegir método de pago</h3>
    <button class="btn btn-primary metodoPagoBtn" data-metodo-pago="efectivo">Efectivo</button>
    <button class="btn btn-primary metodoPagoBtn" data-metodo-pago="tarjeta">Tarjeta</button>
    <button class="btn btn-primary metodoPagoBtn" data-metodo-pago="transferencia">Transferencia</button>
</div>

<div id="fichaConsulta" style="display: none;">
    <h2>Ficha de Consulta Médica</h2>
    <div id="datosConsulta">
        <!-- Aquí se mostrarán los datos de la consulta médica -->
    </div>
    <button id="descargarPDF">Descargar PDF</button>
</div>

<!-- <script>
    // Escuchar el evento 'click' en el botón Seleccionar (para mostrar los horarios disponibles)
    document.querySelectorAll('.seleccionarHoraBtn').forEach(btn => {
    btn.addEventListener('click', () => {
        // Obtener el ID del médico asociado al botón
        const medicoId = btn.dataset.medicoId;

        // Hacer una solicitud AJAX para obtener los horarios del médico
        fetch(`/obtener-horarios?medico_id=${medicoId}`)
        .then(response => response.json())
        .then(data => {
            // Limpiar la tabla de horarios
            const tablaHorarios = document.getElementById('tablaHorarios');
            tablaHorarios.querySelector('tbody').innerHTML = '';

            // Mostrar los horarios en la tabla
            data.forEach(horario => {
                const fila = `
                    <tr>
                        <td>${horario.dia}</td>
                        <td>${horario.horaI}</td>
                        <td>${horario.horaF}</td>
                        <td>${horario.nombre}</td>
                    </tr>
                `;
                tablaHorarios.querySelector('tbody').innerHTML += fila;
            });

            // Ocultar la tabla de médicos y mostrar la tabla de horarios
            document.getElementById('tablaMedicos').style.display = 'none';
            tablaHorarios.style.display = 'block';
        })
        .catch(error => {
            console.error('Error al obtener los horarios:', error);
        });
    });
});

</script> -->



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




        function handleSeleccionarMedico() {
    // Escuchar el evento 'click' en los botones Seleccionar de la tabla de médicos
    document.querySelectorAll('.seleccionarHoraBtn').forEach(btn => {
        btn.addEventListener('click', () => {
            // Obtener el ID del médico asociado al botón
            const medicoId = btn.dataset.medicoId;
            // Guardar el ID del médico en el almacenamiento local
            localStorage.setItem('medicoId', medicoId);
            // Hacer una solicitud AJAX para obtener los horarios del médico
            fetch(`/obtener-horarios?medico_id=${medicoId}`)
            .then(response => response.json())
            .then(data => {
                // Limpiar la tabla de horarios
                const tbodyHorarios = document.getElementById('tbodyHorarios');
                tbodyHorarios.innerHTML = '';

                // Mostrar los horarios en la tabla
                data.forEach(horario => {
                    const fila = `
                        <tr>
                            <td>${horario.id}</td>
                            <td>${horario.dia}</td>
                            <td>${horario.horaI}</td>
                            <td>${horario.horaF}</td>
                            <td>
                                <!-- Aquí puedes agregar botones u otras acciones -->
                                <button class="btn btn-primary seleccionarCitaBtn" data-horario-id="${horario.id}">Seleccionar</button>
                            </td>
                        </tr>
                    `;
                    tbodyHorarios.innerHTML += fila;
                });

                // Ocultar la tabla de médicos y mostrar la tabla de horarios
                document.getElementById('tablaMedicos').style.display = 'none';
                tablaHorarios.style.display = 'block';

                // Escuchar el evento 'click' en los botones Seleccionar Cita
                document.querySelectorAll('.seleccionarCitaBtn').forEach(btn => {
                    btn.addEventListener('click', () => {
                        // Ocultar la tabla de horarios
                        document.getElementById('tablaHorarios').style.display = 'none';
                        // Obtener el ID del horario seleccionado
                        const horarioId = btn.dataset.horarioId;
                        // Mostrar los botones de método de pago
                        document.getElementById('metodosPago').style.display = 'block';
                        // Guardar el ID del horario seleccionado en el almacenamiento local
                        localStorage.setItem('horarioSeleccionado', horarioId);
                    });
                });

            })
            .catch(error => {
                console.error('Error al obtener los horarios:', error);
            });
        });
    });
}

// Escuchar el evento 'click' en los botones de método de pago
document.querySelectorAll('.metodoPagoBtn').forEach(btn => {
    btn.addEventListener('click', () => {
        // Obtener el método de pago seleccionado
        const metodoPago = btn.dataset.metodoPago;

        // Obtener el ID del horario seleccionado del almacenamiento local
        const horarioId = localStorage.getItem('horarioSeleccionado');
        // Obtener el ID del especialidad seleccionado del almacenamiento local
        const especialidadId = localStorage.getItem('especialidadSeleccionado');
        // Obtener el ID del médico del almacenamiento local
        const medicoId = localStorage.getItem('medicoId');
        // Obtener la fecha actual en formato YYYY-MM-DD
        const fechaActual = new Date().toISOString().split('T')[0];
        // Obtener el token CSRF del meta tag en el HTML
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Realizar una solicitud AJAX para guardar la cita en la base de datos
        fetch('/guardar-cita', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken 
            },
            body: JSON.stringify({
                horarioId: horarioId,
                metodoPago: metodoPago,
                fecha: fechaActual,
                // Agrega el ID del paciente logueado y el ID de la especialidad seleccionada aquí
                idmedico: medicoId,
                idEspecialidad: especialidadId,
                 // Siempre se envía 1, como mencionaste
                //idconsulta: 1
            }),
        })
        .then(response => response.json())
        .then(data => {
            // Aquí puedes manejar la respuesta del servidor, como mostrar un mensaje de éxito
            console.log('Cita guardada correctamente:', data);
        })
        .catch(error => {
            console.error('Error al guardar la cita:', error);
        });
    });


    btn.addEventListener('click', () => {
        // Ocultar los botones del método de pago
        document.querySelectorAll('.metodoPagoBtn').forEach(btn => {
            btn.style.display = 'none';
        });

        // Mostrar la ficha de consulta médica
        document.getElementById('fichaConsulta').style.display = 'block';

        // Realizar una solicitud AJAX para obtener la información de la consulta médica
        fetch(`/obtener-consulta-medica`)
            .then(response => response.json())
            .then(data => {
                // Mostrar los datos de la consulta médica en la ficha
                const datosConsulta = document.getElementById('datosConsulta');
                datosConsulta.innerHTML = `
                <p>ID de la ficha: ${data[data.length - 1].id}</p>
                <p>Fecha: ${data[data.length - 1].fecha}</p>
                <p>Nombre del paciente: ${data[data.length - 1].nombre_usuario}</p>
                <p>Especialidad solicitada: ${data[data.length - 1].nombre_especialidad}</p>
                <p>Numero del consultorio : ${data[data.length - 1].nombre_consultorio}</p>
                <p>Otros datos...</p>
                `;
            })
            .catch(error => {
                console.error('Error al obtener la consulta médica:', error);
            });
    });
});

 


    // Escuchar el evento 'click' en el botón Volver a Médicos
document.querySelector('.volverMedicosBtn').addEventListener('click', () => {
    // Mostrar la tabla de médicos y ocultar la tabla de especialidades
    document.getElementById('tablaHorarios').style.display = 'none';
    document.getElementById('tablaMedicos').style.display = 'block';
});


// Llamar a la función para manejar el evento 'click' en los botones Seleccionar de la tabla de médicos
handleSeleccionarMedico();

// Escuchar el evento 'click' en el botón Seleccionar de la tabla de especialidades
document.querySelectorAll('.seleccionarBtn').forEach(btn => {
    btn.addEventListener('click', () => {
        // Obtener el ID de la especialidad asociada al botón
        const especialidadId = btn.dataset.especialidadId;

        // Hacer una solicitud AJAX para obtener los médicos de la especialidad
        fetch(`/obtener-medicos?especialidad_id=${especialidadId}`)
        .then(response => response.json())
        .then(data => {
            // Limpiar la tabla de médicos
            const tablaMedicos = document.getElementById('tablaMedicos');
            const tbodyMedicos = tablaMedicos.querySelector('tbody');
            tbodyMedicos.innerHTML = '';

            // Mostrar los médicos en la tabla
            data.forEach(medico => {
                const fila = `
                    <tr>
                        <td>${medico.nombres}</td>
                        <td>
                            <button class="btn btn-success seleccionarHoraBtn" data-medico-id="${medico.id}">Seleccionar</button>
                        </td>
                    </tr>
                `;
                tbodyMedicos.innerHTML += fila;
            });

            // Ocultar la tabla de especialidades y mostrar la tabla de médicos
            document.getElementById('tablaEspecialidades').style.display = 'none';
            tablaMedicos.style.display = 'block';
            // Obtener el ID del especialidad seleccionado
            //const especialidadId = btn.dataset.especialidadId;
             // Guardar el ID del especialidad seleccionado en el almacenamiento local
             localStorage.setItem('especialidadSeleccionado', especialidadId);
            // Llamar a la función para manejar el evento 'click' en los botones Seleccionar de la tabla de médicos después de actualizar la tabla
            handleSeleccionarMedico();
        })
        .catch(error => {
            console.error('Error al obtener los médicos:', error);
        });
    });
});

    // Escuchar el evento 'click' en el botón Volver a Especialidades
    document.querySelector('.volverBtn').addEventListener('click', () => {
        // Mostrar la tabla de especialidades y ocultar la tabla de médicos
        document.getElementById('tablaEspecialidades').style.display = 'block';
        document.getElementById('tablaMedicos').style.display = 'none';
    });
    </script>
</x-app-layout>
