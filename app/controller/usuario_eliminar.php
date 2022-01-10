<?php

defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'core/loader.php');

$datos=new datos();     
$sql = "DELETE FROM usuarios WHERE id='".$_POST["id"]."'";
$resultado=$datos->consulta($sql);

if($resultado){
	die('1');
}else{
	die('2');
}
?>
