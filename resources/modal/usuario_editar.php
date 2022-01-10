<?php
defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'loader.php');

$datos=new datos();
$sql = "SELECT * FROM usuarios WHERE id='{$_POST['id']}'";
$resultado=$datos->consulta($sql);
$fila = $resultado->fetch_assoc();
?>
<!-- Standard modal content -->
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" 
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(45deg,#283581f2,#000000);">
                <h4 class="modal-title text-white" id="standard-modalLabel">Editar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="#" id="fr_ed_usuario" name="fr_ed_usuario" class="needs-validation" novalidate>
            <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="<?php echo($fila['id']);?>">                
                    <div class="form-group row mb-2">
                        <label for="usuario" class="col-4 col-form-label">Usuario</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="" required="" disabled=""
                                value="<?php echo($fila['usuario']);?>">
                        </div>                        
                    </div>
                    <div class="form-group row mb-2">
                        <label for="nombre" class="col-4 col-form-label">Nombre Completo</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required=""
                                value="<?php echo($fila['nombre']);?>">
                        </div>                        
                    </div>             
                    <div class="form-group row mb-2">
                        <label for="estado" class="col-4 col-form-label">Estado</label>
                        <div class="col-8">
                            <select class="form-control" id="estado" name="estado">
                                <?php
                                    if ($fila['estado']) {
                                        echo '  <option value="0">Inactivo</option>
                                                <option value="1" selected="">Activo</option>';
                                    }else{
                                        echo '  <option value="0" selected="">Inactivo</option>
                                                <option value="1">Activo</option>';
                                    }
                                ?>
                            </select>
                        </div>                        
                    </div>                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger mr-1 mb-2 ripple" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-info mr-1 mb-2 ripple">Editar Usuario</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->