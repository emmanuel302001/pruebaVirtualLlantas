<?php
include_once "models/postmodel.php";

class ApiPublicaciones{
    function getAllPost($user,$pass){
        $publicacion = new Publicacion();
        $publicaciones = array();

        $res = $publicacion->obtenerPublicaciones();
        $usuario_ws=isset($_SERVER['PHP_AUTH_USER'])?$_SERVER['PHP_AUTH_USER']:"$user";
        $password_ws=isset($_SERVER['PHP_AUTH_PW'])?$_SERVER['PHP_AUTH_PW']:"$pass";
        if ($usuario_ws=="admin" && $password_ws=="1234") {
            if ($res->rowCount()) {
                while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                    $item = array(
                        'idpost' => $row['IDPOST'],
                        'titulopost' => $row['TITULOPOST'],
                        'descripcion' => $row['DESCRIPCION'],
                        'fechacre' => $row['FECHACRE'],
                        'urlimagen' => $row['urlImagen']
                    );
                    array_push($publicaciones,$item);
                }
    
                echo json_encode($publicaciones);
            }else{
                echo json_encode(array('mensaje' => 'No hay elementos registrados'));
            }
        }else{
            echo json_encode(array('mensaje' => 'Autenticacion fallida'));
        }
        
    }
    function postPublicacion($user,$pass,$titulo,$email,$imagen,$contenido){
        $publicacion = new Publicacion();

        $usuario_ws=isset($_SERVER['PHP_AUTH_USER'])?$_SERVER['PHP_AUTH_USER']:"$user";
        $password_ws=isset($_SERVER['PHP_AUTH_PW'])?$_SERVER['PHP_AUTH_PW']:"$pass";
        if ($usuario_ws=="admin" && $password_ws=="1234") {
            $publicacion->crearPublicacion($titulo,$email,$imagen,$contenido);
        }else{
            echo json_encode(array('mensaje' => 'Autenticacion fallida'));
        }
        
    }
}
?>