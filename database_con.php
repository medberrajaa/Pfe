<?php
    $db_username = 'root';
    $db_password = '';
    $db_name = 'pfe';
    $db_host = 'localhost';
    $db = new mysqli($db_host, $db_username, $db_password,$db_name,3306);
    if(!$db){
        echo "connection error";
    }
?>