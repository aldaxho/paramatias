    <!-- Modal de Añadir Servicio -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addServiceModalLabel">Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action=" {{ url('/asignar_rol') }} " method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tipo_servicio">Usuario</label>
                            <select class="text_color" name="usuario_id" required="">
                                <option value="" selected>Seleccionar usuario...</option>
                                @foreach ($usuario as $user)
                                    <option value="{{ $user->id}}">{{ $user->id}}
                                        ...{{ $user->nombres}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipo_servicio">Asignar rol</label>
                            <select class="text_color" name="rol_id" required="">
                                <option value="" selected>Seleccionar usuario...</option>
                                @foreach ($rol as $rols)
                                    <option value="{{ $rols->id}}">{{ $rols->id}}
                                        ...{{ $rols->rol}}</option>
                                @endforeach
                            </select>              
                            {{-- <input type="text" class="form-control" id="tipo_servicio" name="tipo_servicio" required> --}}
                        </div>
                    </div>
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Asignar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>