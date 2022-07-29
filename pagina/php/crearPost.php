<?php
if(!empty($_POST)){
	if(isset($_POST["titulo"]) &&isset($_POST["email"]) &&isset($_POST["contenido"])){
		if($_POST["titulo"]!=""&& $_POST["email"]!=""&&$_POST["contenido"]!=""){
			include "conexion.php";
            $sqlId = "SELECT MAX(IDPOST) FROM tblpost;";
            $queryId = $con->query($sqlId);
            $r = $queryId->fetch_array();
            $IDPOST = $r["0"]+1;
            $rutaIMG = 'imagenes/'.$IDPOST.$_FILES["imagen"]["name"];
            $rutaSave = '../imagenes/'.$IDPOST.$_FILES["imagen"]["name"];
            
			$sql = "INSERT INTO tblpost (TITULOPOST,EMAIL,DESCRIPCION,FECHACRE,urlImagen) VALUES (\"$_POST[titulo]\",\"$_POST[email]\",\"$_POST[contenido]\",NOW(),\"$rutaIMG\")";
			$query = $con->query($sql);
			if($query!=null){
                move_uploaded_file($_FILES["imagen"]["tmp_name"],$rutaSave);
				print "<script>window.location='../index.php';</script>";
			}
		}else{
            print "<script>alert(\"Todos los campos son requeridos\");window.location='../index.php';</script>";
        }
	}
}



?>