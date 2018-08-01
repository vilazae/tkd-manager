<?php
session_start();
if(isset($_SESSION['session_user'])){
	echo($_SESSION['session_user']->name);
}
else{
	header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
}
?>

<!doctype html>
<html>
    <head>
    	<meta charset="UTF-8">
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
    	<script>
    		window.nombreUsuario = '<?php echo $_SESSION['session_user']->nombre; ?>';
    		window.sessionToken = '<?php echo $_SESSION['session_user']->token; ?>';
    	</script>
    </head>
    <body ng-app="tkdApp">
        <div>
            <a href="./backend/logout.php"> Cerrar sesion</a>

        </div>
        <div ui-view></div>
    </body>
</html>