<?php
include_once "models/usermodel.php";

class ApiUsuarios{
    function getAllUsers($email,$password,$user,$pass){
        $usuario = new Usuario();
        $usuarios = array();

        $res = $usuario->obtenerUsuario($email,$password);
        $usuario_ws=isset($_SERVER['PHP_AUTH_USER'])?$_SERVER['PHP_AUTH_USER']:"$user";
        $password_ws=isset($_SERVER['PHP_AUTH_PW'])?$_SERVER['PHP_AUTH_PW']:"$pass";
        if ($usuario_ws=="admin" && $password_ws=="1234") {
            if ($res->rowCount()) {
                while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                    $item = array(
                        'idusuario' => $row['IDUSUARIO'],
                        'nombre' => $row['NOMBRE'],
                        'apellido' => $row['APELLIDO'],
                        'email' => $row['EMAIL'],
                        'contrasena' => $row['CONTRASENA']
                    );
                    array_push($usuarios,$item);
                }
    
                echo json_encode($usuarios);
            }else{
                echo json_encode(array('mensaje' => 'No hay elementos registrados'));
            }
        }else{
            echo json_encode(array('mensaje' => 'Autenticacion fallida'));
        }
    }
}
?>
