<?php

session_start();

session_destroy();

header('location:index.php');

?>

<?php
	require_once "conn.php";
	unset($_SESSION['access_token']);
	$gClient->revokeToken();
	session_destroy();
	header('Location: index.php');
	exit();
?>