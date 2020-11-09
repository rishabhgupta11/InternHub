<?php

require_once '../../vendor/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => '368743007539171',
  'app_secret'     => '1eb285d78e78fad7be989bc04845dbf4',
  'default_graph_version'  => 'v2.10'
]);

?>