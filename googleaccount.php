<?php
session_start();
require_once "Admin/conn.php";

// Check if user is already logged in
if (!isset($_SESSION['access_token']) && !isset($_GET['code'])) {
    // Redirect to login page if not authenticated
    header('Location: login.php');
    exit();
}

// Check if access token is set and fetch if not
if (isset($_GET['code'])) {
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
}

// Initialize Google OAuth client
$gClient->setAccessToken($_SESSION['access_token']);
$oAuth = new Google_Service_Oauth2($gClient);
$userData = $oAuth->userinfo_v2_me->get();

// Store user data in session
$_SESSION['picture'] = $userData->picture;
$_SESSION['givenName'] = $userData->givenName;
$_SESSION['familyName'] = $userData->familyName;
$_SESSION['email'] = $userData->email;
$_SESSION['gender'] = $userData->gender;
$_SESSION['id'] = $userData->id;

// Check if user already exists in the database
$email = $userData->email;
$sql = "SELECT COUNT(*) AS count FROM `users` WHERE `Email` = '$email'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

// Insert user data into the database if not already exists
if ($count == 0) {
    $sql = "INSERT INTO `users`(`Image`, `First Name`, `Last Name`, `Email`, `Gender`, `Google ID`) 
            VALUES ('$userData->picture', '$userData->givenName', '$userData->familyName', 
                    '$userData->email', '$userData->gender', '$userData->id')";
    mysqli_query($con, $sql);
}

// Redirect to home page
header('Location: index.php');
exit();
?>
