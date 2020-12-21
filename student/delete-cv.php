<?php
    include("../includes/connect.php");
    require("../includes/connect2.php");
    
    $email = $_SESSION['email'];
    
    $query1 = "SELECT CVfile FROM user_cv WHERE Email='$email'";
    $result1 = mysqli_query($con, $query1);
    $row1 = mysqli_fetch_array($result1);
    
    $cvfile = $row1['CVfile'];
    
    $query2 = "DELETE FROM user_cv WHERE CVfile='$cvfile'";
    mysqli_query($con, $query2);
    
    $query3 = "DELETE FROM cv_details WHERE CVfile='$cvfile'";
    mysqli_query($con, $query3);
    
    header('location: ../student/your-cv.php');
?>  