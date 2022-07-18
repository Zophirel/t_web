<?php 
    include "database.php";
    include "utente.php";

    $post_data = json_decode(file_get_contents('php://input'), true);
    $db = new Database();
    $db = $db -> getConnection();
    $user = new Utente($db, $post_data["nome"], $post_data["cognome"], $post_data["email"], $post_data["pass"]);
    echo $user -> checkData();
    echo $user -> signup();
    
?>