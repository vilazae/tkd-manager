<?php
require 'DBConnection.class.php';

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

    //  Championships List.
    if ( $data["action"] == "list_competitors" ) {
        $res = $db -> query('SELECT * FROM tkd_competitors;');
        
        $rows = array();
        while ( $row = $res->fetch_array() ) {
            $tmp = new stdClass();
            $tmp->id                   = $row[0];
            $tmp->name                 = $row[1];
            $tmp->surname              = $row[2];
            $tmp->dni                  = $row[3];
            $tmp->birthday_date        = $row[4];
            $tmp->gender               = $row[5];
            $tmp->liscense             = $row[6];
            $tmp->liscense_expiry_date = $row[7];
            $tmp->club_id              = $row[8];

            $rows[] = $tmp;
        }
        print_r( json_encode( $rows ) );
    }

}
 
?>