<?php

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
	  <form action="./backend/login.php" method="post">
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