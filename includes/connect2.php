<?php
    $conn = new mysqli("localhost","root","4b86XcMhd8PHQi3d","internhub");
    if($conn->connect_error){
        die("Connection Failed!".$conn->connect_error);
    }
    if(!isset($_SESSION)) 
    { 
        session_start();
    }
?>

