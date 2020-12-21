<?php
    $conn = new mysqli(" "," "," "," ");
    if($conn->connect_error){
        die("Connection Failed!".$conn->connect_error);
    }
    if(!isset($_SESSION)) 
    { 
        session_start();
    }
?>

