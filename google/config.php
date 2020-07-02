<?php

require_once 'vendor/autoload.php';

$google_client = new Google_Client();

$google_client->setClientID('525306495890-ov7v7h1qki87kjkej2i1mfpig7s8e96s.apps.googleusercontent.com');

$google_client->setClientSecret('yYlizixgDSNbOmgwBofKaZ33');

$google_client->setRedirectUri('http://127.0.0.1:8000/IssueTrackerTicketingSystem/google/index.php');

$google_client->addScope('email');

$google_client->addScope('profile');

session_start();
?>