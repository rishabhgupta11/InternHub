<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once '../../vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId(' ');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret(' ');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://redirect_URI/includes/google_signin.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
    if(!isset($_SESSION)) 
    { 
        session_start();
    }

?>
