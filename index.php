<?php

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'u694337422_yhyby');

/** MySQL database username */
define('DB_USER', 'u694337422_yzuhy');

/** MySQL database password */
define('DB_PASSWORD', 'aGeRarydum');

/** MySQL hostname */
define('DB_HOST', 'mysql');

/** Database Charset to use in creating database tables. */
// define('DB_CHARSET', 'utf8_unicode_ci');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');




print_r($_POST);
print_r('<br>');
if (isset($_POST['usuario']) && $_POST['usuario'] != '') {
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if ($mysqli->connect_errno) {
		echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$usuario = $_POST['usuario'];
	$sentencia = $mysqli->prepare("SELECT * FROM tkd_usuarios WHERE correo = ?");
	$sentencia->bind_param("s", $usuario);
	$sentencia->execute();
	$sentencia->bind_result($col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8);

	/* fetch values */
	
	
	
	while ($sentencia->fetch()) {
		session_start();
		// echo "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];		
		$session_user = new stdClass();
		$session_user->nombre = $col2;
		$session_user->apellidos = $col3;
		$_SESSION['session_user'] = $session_user;
		
		header('Location:  tkdApp.php');
		
	}
}





/*

// Realizar una consulta MySQL
$query = 'SELECT tkd_usuarios.nombre as persona, tkd_usuarios.apellidos, tkd_clubes.nombre FROM tkd_usuarios JOIN tkd_clubes ON tkd_usuarios.club_id = tkd_clubes.id';

*/


?>
<!doctype html>
<html>
  <head>
	<meta charset="UTF-8">

  </head>
  <body>
    <div>
      <hr>
      <h1>Login Vitoriiiiin!</h1>
	  <form action="./index.php" method="post">
		<div>
			<label>Usuario:</label>
			<input type='text' name='usuario' placeholder="direccion@correo.com">
		</div>
		<div>
			<label>Contraseña:</label>
			<input type='password' name='password'>
		</div>
		<div>
			<input type='submit' text='Entrar'>
		</div>
	  </form>
    </div>
  </body>
</html>