<?php
    include "database.php";
    include "ombrellone.php";
    
    $post_data = json_decode(file_get_contents('php://input'), true);
    $db = new Database();
    $db = $db -> getConnection();
    $ombrellone = new Ombrellone($db, $post_data['ombr_id']);
    
    try{ 
        $ombrellone -> setReservation($post_data["user_id"], $post_data["data_prenotazione"]);
        $body = array("msg" => "Success");
        header('HTTP/1.1 200 OK');
        header('Content-Type: application/json');
        echo json_encode($body);

    }catch(Exception $e){
        $body = array('msg' => "Non e' possibile prenotare" . $e); 
        header('HTTP/1.1 401 Unauthorized');
        echo json_encode($body);
    }
?>