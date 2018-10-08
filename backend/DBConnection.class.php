<?php

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ddb102461');

/** MySQL database username */
define('DB_USER', 'ddb102461');

/** MySQL database password */
define('DB_PASSWORD', 'VictorTaek2017');

/** MySQL hostname */
define('DB_HOST', 'mysql');

/** Database Charset to use in creating database tables. */
// define('DB_CHARSET', 'utf8_unicode_ci');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

class DBConnection {
    // The database connection
    protected static $connection;

    /**
     * Connect to the database
     * 
     * @return bool false on failure / mysqli MySQLi object instance on success
     */
    public function connect() {    
        // Try and connect to the database
        if(!isset(self::$connection)) {
            self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            // Load configuration as an array. Use the actual location of your configuration file
            // $config = parse_ini_file('./config.ini'); 
            // self::$connection = new mysqli('localhost',$config['username'],$config['password'],$config['dbname']);
        }

        // If connection was not successful, handle the error
        if(self::$connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return false;
        }
        return self::$connection;
    }

    /**
     * Query the database
     *
     * @param $query The query string
     * @return mixed The result of the mysqli::query() function
     */
    public function query($query) {
        // Connect to the database
        $connection = $this -> connect();

        // Query the database
        $result = $connection -> query($query);

        return $result;
    }

    /**
     * Fetch rows from the database (SELECT query)
     *
     * @param $query The query string
     * @return bool False on failure / array Database rows on success
     */
    public function select($query) {
        $rows = array();
        $result = $this -> query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * Fetch the last error from the database
     * 
     * @return string Database error message
     */
    public function error() {
        $connection = $this -> connect();
        return $connection -> error;
    }

    /**
     * Quote and escape value for use in a database query
     *
     * @param string $value The value to be quoted and escaped
     * @return string The quoted and escaped string
     */
    public function quote($value) {
        $connection = $this -> connect();
        return "'" . $connection -> real_escape_string($value) . "'";
    }

    function logout(){
        //Eliminar las variables de sesión definiendo $_SESSION como un array vacío
        $_SESSION=array();

        //Destruir la sesión
        session_destroy();
        header("Location: index.php");
    }

    function login(){
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $sentencia = $mysqli->prepare("SELECT name, last_name, club_id, rol_id  FROM tkd_users WHERE email = ? AND password = ?");
        //$sentencia = $mysqli->prepare("SELECT name, last_name, club_id, rol_id  FROM tkd_users");
        $sentencia->bind_param("ss", $usuario, $password);
        $sentencia->execute();
        $sentencia->bind_result($col_name, $col_last_name, $col_club_id, $col_rol_id);

        /* fetch values */

        if ($sentencia->fetch()) {
            session_start();
            // echo "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];     
            $session_user = new stdClass();
            $session_user->name = $col_name;
            $session_user->last_name = $col_last_name;
            $session_user->club_id = $col_club_id;
            $session_user->rol_id = $col_rol_id;
            $_SESSION['session_user'] = $session_user;
            
            header('Location:  tkdApp.php');
            
        }
    }
}
?>