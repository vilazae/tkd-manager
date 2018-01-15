<?php
include_once("DBConnection.php");

//Eliminar las variables de sesión definiendo $_SESSION como un array vacío
if(isset($_SESSION['session_user'])){
	$db = new DBConnection();
	$result = $db -> query("DELETE FROM tkd_sessions WHERE id = 1");
	if(!$result)
	{
		echo "Algo ha salido mal";
	}
	else{
		echo("Se ha ejecutado la consulta");
		$_SESSION=array();
		//Destruir la sesión
		session_destroy();
	}
}
//header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);

    	


    /*$mysqli = $db->connect(); 
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    $sentencia = $mysqli->prepare("DELETE FROM tkd_sessions WHERE id = 1");
    //$sentencia->bind_param("s", "12314546454ad");
    //$sentencia->execute();

    // fetch values 

    if ($sentencia->fetch()) {
    	//Eliminar las variables de sesión definiendo $_SESSION como un array vacío
    	$_SESSION=array();
	    //Destruir la sesión
	    session_destroy();
	    header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
    }
    else {
    	echo "Se ha producido un error";
    }*/
?>