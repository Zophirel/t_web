<?php 
    include "database.php";
    include "utente.php";
    
    $db = new Database();
    $db = $db -> getConnection();
    $post_data = json_decode(file_get_contents('php://input'), true);
    $user = new Utente($db, null, null, $post_data["email"], $post_data["pass"]);
    
    try{
        
        $user -> login();
        $body = array('msg' => 'Login effettuato', 'id' => $_SESSION['id'], 'nome' => $_SESSION['nome'], "cognome" => $_SESSION['cognome']);
        header('HTTP/1.1 200 OK');
        echo json_encode($body);

    }catch(Exception $e){
        $body = array('msg' => 'I dati inseriti non sono corretti'); //etc
        header('HTTP/1.1 401 Unauthorized');
        echo json_encode($body);
    } 
?>