    <!-- Modal de Añadir Servicio -->
    <div class="modal fade" id="modalCrear" tabindex="-1"
         aria-labelledby="modalCrearLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearLabel">Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action=" {{ url('/crear_nuevo_usuario') }} " method="POST">
                    @csrf       
                         
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tipo_servicio">ID</label>
                            <input type="text" class="form-control" name="id" required>
                        </div>                      
                    
                        <div class="form-group">
                            <label for="tipo_servicio">CI</label>
                            <input type="text" class="form-control" name="ci" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="tipo_servicio">Nombes</label>
                            <input type="text" class="form-control" name="nombres" required>
                        </div>
                   
                        <div class="form-group">
                            <label for="tipo_servicio">Apellido Paterno</label>
                            <input type="text" class="form-control" name="apellido_paterno" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="tipo_servicio">Apellido Materno</label>
                            <input type="text" class="form-control"  name="apellido_materno" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="tipo_servicio">Sexo</label>
                            <input type="text" class="form-control" id="" name="sexo" required>
                        </div>
                
                        <div class="form-group">
                            <label for="tipo_servicio">Telefono</label>
                            <input type="text" class="form-control" id="tipo_servicio" name="telefono" required>
                        </div>

                        <div class="form-group">
                            <label for="tipo_servicio">Direccion</label>
                            <input type="text" class="form-control" name="direccion" required>
                        </div>
                   
                        <div class="form-group">
                            <label for="tipo_servicio">Correo</label>
                            <input type="text" class="form-control" id="tipo_servicio" name="email" required>
                        </div>
               
                        <div class="form-group">
                            <label for="tipo_servicio">Contraseña</label>
                            <input type="text" class="form-control" id="tipo_servicio" name="password" required>
                        </div>
                    </div> 
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
        </div>