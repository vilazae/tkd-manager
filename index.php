<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="css/login.css" rel="stylesheet">
	</head>
	<body class="bg-tkd">

		<div class="modal fade modal-tkd" id="login-modal" >
			<div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Acceso a TKD Manager</h1><br>
					<form action="./backend/login.php" method="post">
						<input type="text" name="usuario" placeholder="Usuario" required>
						<input type="password" name="password" placeholder="Contraseña" required>
						<input type="submit" name="login" class="login loginmodal-submit" value="Acceder">
					</form>

					<div class="login-help">
						<a href="#">Register</a> - <a href="#">Forgot Password</a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>