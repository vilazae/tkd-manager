<?php
include_once("DBConnection.php");

if (isset($_POST['usuario']) && $_POST['usuario'] != '') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $db = new DBConnection();
    /*$rows = $db->select("SELECT name, last_name, email, club_id, rol_id  FROM tkd_users WHERE email = ".$usuario." AND password = ".$password);
    if($rows > 0)
    {
        echo("Hay registros");
    }
    else
    {
        echo("no hay registros");
    }*/
    $mysqli = $db->connect();
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $sentencia = $mysqli->prepare("SELECT name, last_name, email, club_id, rol_id  FROM tkd_users WHERE email = ? AND password = ?");
        $sentencia->bind_param("ss", $usuario, $password);
        $sentencia->execute();
        $sentencia->bind_result($col_name, $col_last_name, $col_email, $col_club_id, $col_rol_id);

        // fetch values 

        if ($sentencia->fetch()) {
            session_start();
            // echo "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];     
            $session_user = new stdClass();
            $session_user->name = $col_name;
            $session_user->last_name = $col_last_name;
            $session_user->email = $col_email;
            $session_user->club_id = $col_club_id;
            $session_user->rol_id = $col_rol_id;
            $session_user->token = uniqid();
            $_SESSION['session_user'] = $session_user;
            $sentencia->close();
            //Insertar datos de sesión en BD
            /*
            $sentencia_insert = $mysqli->prepare("INSERT INTO tkd_sessions (user, token, init_date) VALUES (?, ?, NOW())");
            $sentencia_insert->bind_param("ss", $_SESSION['session_user']->email, $_SESSION['session_user']->token);
            if ($sentencia_insert->fetch()) {
                $sentencia_insert->execute();                
                $sentencia_insert->close();                
            }
            else {
                echo("Hubo un error insertando datos");
            }

            echo("Todo OK");
            //header('Location:  ../tkdApp.php');
            
        }
        else {
            echo("Error en el login");
        }
        $mysqli->close();*/
    }
}
?>