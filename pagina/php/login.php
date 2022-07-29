<?php
if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			include "conexion.php";
			$data = json_decode(file_get_contents("http://localhost/pruebaVirtualLlantas/api/usuario.php?email=$_POST[username]&password=$_POST[password]&user=admin&pass=1234"), true);
			for ($i=0; $i < $data; $i++) { 
				$user_id=$data[$i]['idusuario'];
				break;
			}
			if($user_id==null){
				
				print "<script>alert(\"Acceso invalido.\");window.location='../index.php';</script>";
				
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				print "<script>window.location='../home.php';</script>";
			}
		}
	}
}
?>