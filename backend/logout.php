<?php
include_once("DBConnection.php");
session_start();

//Eliminar las variables de sesión definiendo $_SESSION como un array vacío
if(isset($_SESSION['session_user'])){
	$db = new DBConnection();
    $token = "5a5d4278ef3d6";
	$result = $db -> query("DELETE FROM tkd_sessions WHERE token = '".$_SESSION['session_user']->token."'");
	if(!$result)
	{
		echo "DELETE ABORT";
	}
	else{
		echo("DELETE OK");
		$_SESSION=array();
		//Destruir la sesión
		session_destroy();
	}
}
else{
    echo "No hay sesion activa";
}
header('Location:  ../index.php');
?>