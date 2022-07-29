<?php
include_once "controllers/usercontroller.php";
$apiUser = new ApiUsuarios();
$email = $_GET['email'];
$password = $_GET['password'];
$user = $_GET['user'];
$pass = $_GET['pass'];
$apiUser->getAllUsers($email,$password,$user,$pass);
?>