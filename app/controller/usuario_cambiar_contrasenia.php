<?php

defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Cfactura'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'core/loader.php');

$datos=new datos();

$contrasenia=md5($_POST['contrasenia']);

$sql = "UPDATE usuarios SET 
				contrasenia='$contrasenia'
              WHERE id='{$_POST['id']}'";  

$resultado=$datos->actualizar($sql);

if($resultado){
	die('1');
}else{
	die('2');
}
?>
