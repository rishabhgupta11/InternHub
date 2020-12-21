<?php
    $con= mysqli_connect(" "," "," "," ")
    or die(mysqli_error($con));
    if(!isset($_SESSION)) 
    { 
        session_start();
    }
?>
