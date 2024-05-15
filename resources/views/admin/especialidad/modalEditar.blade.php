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
                <form action=" {{ url('/editar_especialidad', $especialidades->id) }} " method="POST">
                    @csrf       
                         
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="tipo_servicio">Nombe</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                          
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>