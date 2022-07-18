<?php
    include "database.php";
    include "ombrellone.php";
    
    $db = new Database();
    $db = $db -> getConnection();
    $ombrellone = new Ombrellone($db, $_GET['id']);
   
    try{ 
        $body = $ombrellone -> getBooked();
        header('HTTP/1.1 200 OK');
        header('Content-Type: application/json');
        echo json_encode($body);

    }catch(Exception $e){
        $body = array('msg' => 'I dati inseriti non sono corretti'); 
        header('HTTP/1.1 401 Unauthorized');
        echo json_encode($body);
    } 
?>