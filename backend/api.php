<?php
error_reporting(E_ALL);

include_once("DBConnection.php");

session_start();

$db = new DBConnection();

if ( !isSet($_SESSION['data']) ) $_SESSION['data']=array();
 
$data = json_decode(file_get_contents('php://input'), true);

if ( isSet( $data["action"] ) ) {
    //  ** GREETINGS **  //
    if ( $data["action"] == "say_hello" ) {
        echo( "eo eo hello Mr. " . $data['name'] );
    }
 
    if ( $data["action"] == "add_user" ) {
        print_r('estoy en add user');
        print_r($data['parameters']['name']); 
    }

    //  Users List.
    if ( $data["action"] == "list_users" ) {
        $res = $db -> query('SELECT * FROM tkd_usuarios;');
        
        $rows = array();
        while ( $row = $res->fetch_array() ) {
            $tmp = new stdClass();
            $tmp->id = $row[0];
            $tmp->name = $row[1];
            $tmp->surname = $row[2];
            $tmp->email = $row[5];

            $rows[] = $tmp;
        }
        print_r( json_encode( $rows ) );
    }

    //  Competitors List.
    if ( $data["action"] == "list_competitors" ) {
        $mysqli = $db->connect();
        if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $response = $db->select("SELECT * FROM tkd_competitors;");



        $rows = array();
        print_r($response);exit;
            foreach ($response as $row) {
                // $tmp = new stdClass();
                $tmp = array(
                    'id'                  => $row['id'],
                    'name'                => $row['name'],
                    'last_name'           => $row['last_name'],
                    'dni'                 => $row['dni'],
                    'birth_date'          => $row['birth_date'],
                    'license_number'      => $row['license_number'],
                    'liscense_expiration' => $row['liscense_expiration'],
                    'gender'              => $row['gender'],
                    'gender'              => $row['gender'],
                    'belt'                => $row['cinturon'],
                    'club_id'             => $row['club_id']
                );
            print_r( json_encode($tmp));exit;


            $rows[] = $tmp;
        }
    
             print_r($rows);
        // $db->close();
        $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
             print_r($arr);exit;

        print_r( json_encode($rows));
        // print_r( json_encode( $rows ) );
    }

    //  Championship List.
    if ( $data["action"] == "list_championships" ) {
        $mysqli = $db->connect();
        if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $response = $db->select("SELECT * FROM tkd_tournaments;");



        $rows = array();
        print_r($response);exit;
            foreach ($response as $row) {
                // $tmp = new stdClass();
                $tmp = array(
                    'id'                  => $row['id'],
                    'name'                => $row['name'],
                    'date'           => $row['date'],
                    'lugar'                 => $row['lugar'],
                    'abierto'          => $row['abierto']
                );
            print_r( json_encode($tmp));exit;


            $rows[] = $tmp;
        }
    
             print_r($rows);
        // $db->close();
        $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
             print_r($arr);exit;

        print_r( json_encode($rows));
        
    }

    //  Clubes List.
    if ( $data["action"] == "list_clubes" ) {
        $mysqli = $db->connect();
        if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $response = $db->select("SELECT * FROM tkd_clubs;");



        $rows = array();
        print_r($response);exit;
            foreach ($response as $row) {
                // $tmp = new stdClass();
                $tmp = array(
                    'id'                  => $row['id'],
                    'name'                => $row['name'],
                    'cif'           => $row['cif'],
                    'address'                 => $row['address'],
                    'email'          => $row['email']
                );
            print_r( json_encode($tmp));exit;


            $rows[] = $tmp;
        }
    
             print_r($rows);
        // $db->close();
        $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
             print_r($arr);exit;

        print_r( json_encode($rows));
        
    }

}
 
?>