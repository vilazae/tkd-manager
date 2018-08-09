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

    /**
     * COMPETITORS.
     */
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
                'id'                      => $row['id'],
                'name'                    => $row['name'],
                'last_name'               => $row['last_name'],
                'dni'                     => $row['dni'],
                'birth_date'              => $row['birth_date'],
                'license_number'          => $row['license_number'],
                'license_expiration_date' => $row['license_expiration_date'],
                'gender'                  => $row['gender'],
                'belt'                    => $row['cinturon'],
                'club_id'                 => $row['club_id']
            );

            $rows[] = $tmp;
        }

        //  API response.
        print_r( json_encode( $rows ) );
    }

    //  Update Competitor.
    if ( $data["action"] == "update_competitor" ) {
        $mysqli = $db->connect();

        //print_r($data["parameters"]["id"]);

        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        //  BD query.
        $sentencia = $mysqli->prepare("UPDATE tkd_competitors
            SET name = ?, last_name = ?, dni = ?, birth_date = ?, license_number = ?,
            license_expiration_date = ?, gender = ?, cinturon = ?, club_id = ? WHERE
            id = ?");
        $sentencia->bind_param("ssssssssii", $data['parameters']['name'], $data['parameters']['last_name'], $data['parameters']['dni'], $data['parameters']['birth_date'], $data['parameters']['license_number'], $data['parameters']['license_expiration_date'], $data['parameters']['gender'], $data['parameters']['belt'], $data['parameters']['club_id'], $data['parameters']['id']);
        $sentencia->execute();

        if(!$sentencia)
        {
            print_r("UPDATE Competitor ABORT");                
        }
        else
        {
            print_r("UPDATE Competitor OK");
        } 
    }

    //  Add Competitor.
    if ( $data["action"] == "add_competitor" ) {
        $mysqli = $db->connect();

        //print_r($data["parameters"]["id"]);

        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        //  BD query.
        $sentencia = $mysqli->prepare("INSERT INTO tkd_competitors VALUES
            name = ?, last_name = ?, dni = ?, birth_date = ?, license_number = ?,
            license_expiration_date = ?, gender = ?, cinturon = ?, club_id = ? ");
        $sentencia->bind_param("ssssssssi", $data['parameters']['name'], $data['parameters']['last_name'], $data['parameters']['dni'], $data['parameters']['birth_date'], $data['parameters']['license_number'], $data['parameters']['license_expiration_date'], $data['parameters']['gender'], $data['parameters']['belt'], $data['parameters']['club_id']);
        $sentencia->execute();

        if(!$sentencia)
        {
            print_r("INSERT Competitor ABORT");                
        }
        else
        {
            print_r("INSERT Competitor OK");
        } 
    }

    //  Delete Competitor.
    if ( $data["action"] == "delete_competitor" ) {
        $mysqli = $db->connect();

        //print_r($data["parameters"]["id"]);

        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        //  BD query.
        $response = $db->query("DELETE FROM tkd_competitors WHERE id=" . $data['id'] . ";");
        if(!$result)
        {
            echo("INSERT ABORT");                
        }
        else{
            echo("INSERT OK");
        }  

        //  API response.
        echo "dentro de update competitor";
        //print_r( json_encode( $rows ) );
    }

    //CHAMPIONSHIP

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

    //  Update Championship.
    if ( $data["action"] == "update_championship" ) {
        $mysqli = $db->connect();

        print_r("Se van a actualizar los datos de un torneo");

        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        //  BD query.
        $sentencia = $mysqli->prepare("UPDATE tkd_tournaments
            SET name = ?, date = ?, lugar = ?, abierto = ? WHERE
            id = ?");
        $sentencia->bind_param("sssii", $data['parameters']['name'], $data['parameters']['date'], $data['parameters']['lugar'], $data['parameters']['abierto'], $data['parameters']['id']);
        $sentencia->execute();

        if(!$sentencia)
        {
            print_r("UPDATE Championship ABORT");                
        }
        else
        {
            print_r("UPDATE Championship OK");
        } 
    }

    //CLUB

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

    //  Update Club.
    if ( $data["action"] == "update_club" ) {
        $mysqli = $db->connect();

        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        //  BD query.
        $sentencia = $mysqli->prepare("UPDATE tkd_clubs
            SET name = ?, cif = ?, address = ?, email = ? WHERE id = ?");
        $sentencia->bind_param("ssssi", $data['parameters']['name'], $data['parameters']['cif'], $data['parameters']['address'], $data['parameters']['email'], $data['parameters']['id']);
        $sentencia->execute();

        if(!$sentencia)
        {
            print_r("UPDATE Club ABORT");                
        }
        else
        {
            print_r("UPDATE Club OK");
        } 
    }

}

?>