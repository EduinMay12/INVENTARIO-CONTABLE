<!-- Standard modal content -->
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" 
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(45deg,#283581f2,#000000);">
                <h4 class="modal-title text-white" id="standard-modalLabel">Nuevo Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="#" id="fr_usuario" name="fr_usuario" class="needs-validation" novalidate>
            <div class="modal-body">                
                    <div class="form-group row mb-2">
                        <label for="usuario" class="col-4 col-form-label">Usuario</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="" required="">
                        </div>                        
                    </div>
                    <div class="form-group row mb-2">
                        <label for="nombre" class="col-4 col-form-label">Nombre Completo</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required="">
                        </div>                        
                    </div>
                    <div class="form-group row mb-2">
                        <label for="contrasenia" class="col-4 col-form-label">Contraseña</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="contrasenia" name="contrasenia" placeholder="" required="">
                        </div>                        
                    </div>                  
                    <div class="form-group row mb-2">
                        <label for="estado" class="col-4 col-form-label">Estado</label>
                        <div class="col-8">
                            <select class="form-control" id="estado" name="estado">
                                <option value="0">Inactivo</option>
                                <option value="1">Activo</option>
                            </select>
                        </div>                        
                    </div>                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger mr-1 mb-2 ripple" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-info mr-1 mb-2 ripple">Agregar Usuario</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->