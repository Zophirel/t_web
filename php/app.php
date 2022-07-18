<?php
    ini_set("session.cookie_secure", 1);
    if(isset($_COOKIE['PHPSESSID'])){
        session_id($_COOKIE['PHPSESSID']);
        session_start();
        if(isset($_SESSION)){
            
        }else{
            session_destroy();
            header('Location: ../index.php');
            die();
        }
    }else{
        header('Location: ../index.php');
        die();
    }
?>