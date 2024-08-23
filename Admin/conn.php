<?php

$username = 'root';
$password = '';
$server = 'localhost';
$database = 'helpshelp';

$conn = mysqli_connect($server, $username, $password, $database);
?>




<?php
	require_once "API/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("1032356258400-ke7e8biud7jjr3i0v4ofsjmn988oggrc.apps.googleusercontent.com");
	$gClient->setClientSecret("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");
	$gClient->setApplicationName("Help Shelp");
	$gClient->setRedirectUri("http://localhost/HelpShelp/googleaccount.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");	
	$con = new mysqli('localhost', 'root','' ,'helpshelp');
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}	
?>