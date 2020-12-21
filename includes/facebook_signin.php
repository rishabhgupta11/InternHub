<?php

include('facebook_config.php');
require("../includes/connect.php");
require("../../vendor/autoload.php");

$facebook_output = '';
$name = '';
$emailid = '';

$facebook_helper = $facebook->getRedirectLoginHelper();

if(isset($_GET['code']))
{
    if(isset($_SESSION['access_token']))
    {
        $access_token = $_SESSION['access_token'];
    }
    else
    {
        $access_token = $facebook_helper->getAccessToken();

        $_SESSION['access_token'] = $access_token;

        $facebook->setDefaultAccessToken($_SESSION['access_token']);
    }

    $graph_response = $facebook->get("/me?fields=name,email", $access_token);

    $facebook_user_info = $graph_response->getGraphUser();

    if(!empty($facebook_user_info['name']))
    {
        $name = $facebook_user_info['name'];
    }

    if(!empty($facebook_user_info['email']))
    {
        $emailid = $facebook_user_info['email'];
    }
    $user_check_query = "SELECT * FROM user WHERE email='$emailid' LIMIT 1";
    $result = mysqli_query($con, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if (!$user) 
    {
        $query = "INSERT INTO user (Name, Email, Type) VALUES('$name', '$emailid', 'Student')";
        mysqli_query($con, $query);
        $_SESSION['email'] = $emailid;
        header('location: ../student/browse.php');
    }
    else
    {
        $_SESSION['email'] = $emailid;
        header('location: ../student/browse.php');
    }
 
}
else
{
 // Get login url
    $facebook_permissions = ['email']; // Optional permissions

    $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost/ngenza/InternHub/includes/facebook_signin.php', $facebook_permissions);
    
    // Render Facebook login button
    $facebook_login_but = '<a href="'.$facebook_login_url.'"><img src="../images/facebook-signin.png" style="width:40px;"></a>';
}



?>
