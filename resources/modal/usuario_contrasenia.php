

<!-- Standard modal content -->
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" 
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(45deg,#283581f2,#000000);">
                <h4 class="modal-title text-white" id="standard-modalLabel">Cambiar Contraseña</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="#" id="fr_con_usuario" name="fr_con_usuario" class="needs-validation" novalidate 
                oninput='rep_contrasenia.setCustomValidity(rep_contrasenia.value != contrasenia.value ? "x" : "")'>
            <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="<?php echo($_POST['id']);?>">                
                    <div class="form-group row mb-2">
                        <label for="contrasenia" class="col-4 col-form-label">Contraseña</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="contrasenia" name="contrasenia" required="">
                        </div>                        
                    </div>
                    <div class="form-group row mb-2">
                        <label for="rep_contrasenia" class="col-4 col-form-label">Confirmar Contraseña</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="rep_contrasenia" name="rep_contrasenia" placeholder="">
                        </div>                        
                    </div>                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger mr-1 mb-2 ripple" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-info mr-1 mb-2 ripple">Cambiar Contraseña</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->