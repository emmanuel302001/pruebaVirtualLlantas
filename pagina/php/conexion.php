<?php
$password = "";
$user = "root";
$db = "virtualllantas";
$host = "localhost";
try{
	$con = new mysqli($host, $user, $password, $db);
	$con->query("SET NAMES 'utf8'");
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>