<?php
session_start();
if(isset($_SESSION['session_user'])){
	// echo($_SESSION['session_user']->name);
}
else{
	header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
}
?>

<!doctype html>
<html>
    <head>
    	<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is the TKD Manager">
		<meta name="author" content="lazaroezquerro@hotmail.comm">

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/business-frontpage.css" rel="stylesheet">
		<link href="css/app.css" rel="stylesheet">

    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.15/angular-ui-router.min.js"></script>
    	<script src="https://code.angularjs.org/1.4.8/angular-cookies.min.js"></script>

    	<script src="./app/app.js"></script>
    	<script src="./app/common/appServices.js"></script>
        <script src="./app/home/controllers/homeControllers.js"></script>
        <script src="./app/club/controllers/clubControllers.js"></script>
    	<script src="./app/championships/controllers/championshipControllers.js"></script>
    	<script src="./app/competitors/controllers/competitorControllers.js"></script>
        <script src="./app/inscripciones/controllers/inscripcionControllers.js"></script>


		<!-- jQuery -->
		<!-- // <script src="../js/jquery.js"></script> -->

		<!-- Bootstrap Core JavaScript -->
		<!-- // <script src="../js/bootstrap.min.js"></script> -->


		<title>TKD - Manager</title>

    	<script>
    		window.nombreUsuario = '<?php echo $_SESSION['session_user']->nombre; ?>';
    		window.sessionToken = '<?php echo $_SESSION['session_user']->token; ?>';
    	</script>
    </head>
    <body ng-app="tkdApp">
        <div ui-view></div>
    </body>
</html>