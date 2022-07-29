<?php
include_once "db.php";

class Publicacion extends DB{
    function obtenerPublicaciones(){
        $query = $this->connect()->query('SELECT * FROM tblpost order by fechacre DESC');

        return $query;
    }
    function crearPublicacion($titulo,$email,$imagen,$contenido){
        $this->connect()->query("INSERT INTO tblpost (TITULOPOST,EMAIL,DESCRIPCION,FECHACRE,urlImagen) VALUES (\"$titulo\",\"$email\",\"$contenido\",now(),\"$imagen\")");
    }
}
?>