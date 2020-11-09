<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once '../../vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('935813392879-agntdcgqgos3crj4tjaj71jsoh9dsu5h.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('cO-73ikDAX9urjf5U_SvmmUW');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/ngenza/InternHub/includes/google_signin.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
    if(!isset($_SESSION)) 
    { 
        session_start();
    }

?>