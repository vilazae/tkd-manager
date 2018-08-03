<?php

//  These lines enable the error debug mode printing
//  all the error logs in the html responses. Comment them
//  in LIVE environment.
error_reporting(E_ALL);
ini_set('display_errors', true);

include_once("DBConnection.php");

session_start();

$db = new DBConnection();

if ( !isSet($_SESSION['data']) ) $_SESSION['data']=array();

$data = json_decode(file_get_contents('php://input'), true);

if ( isSet( $data["action"] ) ) {
    //  ** GREETINGS **  //
    if ( $data["action"] == "say_hello" ) {
        // echo( "eo eo hello Mr. " . $data['name'] );
    }

    if ( $data["action"] == "add_user" ) {
        print_r('estoy en add user');
        print_r($data['parameters']['name']); 
    }

    //  Users List.
    /*if ( $data["action"] == "list_users" ) {
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
    }*/

    //  Competitors List.
    if ( $data["action"] == "list_competitors" ) {
        $mysqli = $db->connect();

        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        //  BD query.
        $response = $db->select("SELECT * FROM tkd_competitors;");
        $rows = array();

        //  Format response.
        foreach ($response as $row) {
            $tmp = array(
                'id'                  => $row['id'],
                'name'                => $row['name'],
                'last_name'           => $row['last_name'],
                'dni'                 => $row['dni'],
                'birth_date'          => $row['birth_date'],
                'license_number'      => $row['license_number'],
                'liscense_expiration' => $row['license_expiration_date'],
                'gender'              => $row['gender'],
                'belt'                => $row['cinturon'],
                'club_id'             => $row['club_id']
            );

            $rows[] = $tmp;
        }

        //  API response.
        print_r( json_encode( $rows ) );
    }

    //  Update Competitor.
    if ( $data["action"] == "update_competitor" ) {
//print_r( $data["parameters"]);        
        $mysqli = $db->connect();

       print_r($data["parameters"]["id"]);

        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        //  BD query.
        //$response = $db->select("SELECT * FROM tkd_competitors;");


        //  API response.
        echo "dentro de update competitor";
        //print_r( json_encode( $rows ) );
    }



    //  Championship List.
    if ( $data["action"] == "list_championships" ) {
        $mysqli = $db->connect();
        if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $response = $db->select("SELECT * FROM tkd_tournaments;");

        $rows = array();
        
        foreach ($response as $row) {
            // $tmp = new stdClass();
            $tmp = array(
                'id'                  => $row['id'],
                'name'                => $row['name'],
                'date'           => $row['date'],
                'lugar'                 => $row['lugar'],
                'abierto'          => $row['abierto']
            );


            $rows[] = $tmp;
        }
    
          
        //$db->close();

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
        foreach ($response as $row) {
            // $tmp = new stdClass();
            $tmp = array(
                'id'                  => $row['id'],
                'name'                => $row['name'],
                'cif'           => $row['cif'],
                'address'                 => $row['address'],
                'email'          => $row['email']
            );


            $rows[] = $tmp;
        }
    
        //$db->close();
        print_r( json_encode($rows));
        
    }

}

?>