<?php
defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'core/loader.php');

$datos=new datos();
$sql = "SELECT * FROM usuarios";
$resultado=$datos->consulta($sql);

$cadena='
    <div class="widget-body">
        <div class="table-responsive table-scroll padding-right-10" style="max-height:400px;">
            <table id="tb_usuarios" width="100%" class="table mb-0">
                <thead class="table-active"  style="background: linear-gradient(45deg,#475085f2,#309ac5);">
                    <tr>
                        <th>No.</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th><span style="width:100px;">Estado</span</th>
                        <th>Acciones</th>
                    </tr>
                </thead>';
while ($fila = $resultado->fetch_assoc()) {   
if ($fila['estado']) {
    $estado='<span class="btn btn-outline-success mr-1 mb-2 disabled"> Activo </span>';
}else{
    $estado='<span class="btn btn-outline-danger mr-1 mb-2 disabled"> Inactivo </span>';
}
$cadena.='      <tbody>
                    <tr>
                        <td style="width:100px;"><span class="text-primary">'.$fila['id'].'</span></td>
                        <td style="width:300px;">'.$fila['usuario'].'</td>
                        <td style="width:300px;">'.$fila['nombre'].'</td>
                        <td style="width:200px;"><span style="width:100px;">'.$estado.'</span></td>
                        <td class="td-actions">
                            <a href="javascript: usuario_cambiar_contrasenia('.$fila['id'].');">
                                <i class="la la-cog config"></i> Contraseña
                            </a>
                            <a href="javascript: usuario_editar('.$fila['id'].');">
                                <i class="la la-edit edit"></i> Editar
                            </a>
                            <a href="javascript: usuario_eliminar('.$fila['id'].',\''.$fila['usuario'].'\');">
                                <i class="la la-close delete"></i> Eliminar
                            </a>
                        </td>
                    </tr>';           
}
$cadena.='      </tbody>
            </table>
        </div>
    </div>';
echo $cadena;
?>