<?php

defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'core/loader.php');


$datos=new datos();

$usuario=strtolower($_POST['usuario']);

//VERIFICAMOS QUE EL USUARIO NO EXISTA
$sql="SELECT usuario FROM usuarios WHERE usuario='$usuario'";
$cont_usuario=$datos->contador($sql);
if($cont_usuario != "0")
{die('3');}


$contrasenia=md5($_POST['contrasenia']);


$sql = "INSERT INTO 
			usuarios(
				usuario,
				contrasenia,
				nombre,
				permisos,
				estado
			)
			VALUES(
				'{$_POST['usuario']}',				
				'$contrasenia',
				'{$_POST['nombre']}',
				'1',
				'{$_POST['estado']}'
			);";	

$resultado=$datos->actualizar($sql);

if($resultado){
	die('1');
}else{
	die('2');
}
?>
