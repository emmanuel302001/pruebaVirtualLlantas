<?php
include_once "db.php";

class Usuario extends DB{
    function obtenerUsuario($email,$password){
        $query = $this->connect()->query("SELECT * FROM usuario where email = \"$email\" and contrasena = \"$password\";");

        return $query;
    }
}
?>