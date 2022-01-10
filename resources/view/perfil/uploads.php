<?php
    defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR);  
    require_once(_RAIZ.'core/loader.php');
    require_once(_RAIZ.'app/controller/actualizar_perfil.php');
?>
<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Imagen</label>
        <div class="col-lg-6">
            <input class="form-control" type="file" name="file">
        </div>
    </div>
    <div class="em-separator separator-dashed"></div>
    <div class="text-right">
        <button class="btn btn-gradient-04" type="submit">Actualizar Imagen</button>
    </div>
</form>
