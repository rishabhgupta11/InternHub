<?php

require_once '../../vendor/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => ' ',
  'app_secret'     => ' ',
  'default_graph_version'  => 'v2.10'
]);

?>
