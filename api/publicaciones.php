<?php
include_once "controllers/postcontroller.php";
$apiPost = new ApiPublicaciones();
$user = $_GET['user'];
$pass = $_GET['pass'];
$apiPost->getAllPost($user,$pass);
?>