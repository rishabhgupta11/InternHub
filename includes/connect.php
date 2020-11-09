<?php
    $con= mysqli_connect("localhost","root","4b86XcMhd8PHQi3d","internhub")
    or die(mysqli_error($con));
    if(!isset($_SESSION)) 
    { 
        session_start();
    }
?>