    <!-- Modal de Añadir Servicio -->
    <div class="modal fade" id="modalEditarEsp-{{ $especialidades->id }}" tabindex="-1"
        aria-labelledby="modalEditarEspLabel-{{ $especialidades->id }}" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="modalEditarEspLabel-{{ $especialidades->id }}">Editar Especialidad</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <form action=" {{ url('/editar_esp_med', $especialidades->id) }} " method="POST">
                   @csrf       
                        
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tipo_servicio">Nombres</label>
                            <select class="text_color" name="nombres" required="">
                                <option value="" selected>Seleccionar usuario...</option>
                                @foreach ($medico as $usuario_rol)
                                    <option value="{{ $usuario_rol->user->nombres}}">
                                        {{ $usuario_rol->user->id}}
                                        {{ $usuario_rol->user->nombres}}                                                                           
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipo_servicio">Apellido Paterno</label>
                            <select class="text_color" name="apellido_paterno" required="">
                                <option value="" selected>Seleccionar usuario...</option>
                                @foreach ($medico as $usuario_rol)
                                    <option value="{{ $usuario_rol->user->apellido_paterno}}">
                                        {{ $usuario_rol->user->id}}
                                        {{ $usuario_rol->user->apellido_paterno}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipo_servicio">Apellido Paterno</label>
                            <select class="text_color" name="apellido_materno" required="">
                                <option value="" selected>Seleccionar usuario...</option>
                                @foreach ($medico as $usuario_rol)
                                    <option value="{{ $usuario_rol->user->apellido_materno}}">
                                        {{ $usuario_rol->user->id}}
                                        {{ $usuario_rol->user->apellido_materno}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipo_servicio">Especialidad</label>
                            <select class="text_color" name="especialidad_id" required="">
                                <option value="" selected>Seleccionar usuario...</option>
                                @foreach ($especialidad as $esp)
                                    <option value="{{ $esp->id}}">{{ $esp->id}}
                                        ...{{ $esp->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                         
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                       <button type="submit" class="btn btn-primary">Actualizar</button>
                   </div>
               </form>
           </div>
       </div>
   </div>