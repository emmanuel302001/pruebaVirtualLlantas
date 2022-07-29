<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='index.php';</script>";
}else{
    include_once "php/conexion.php";
    $sqlPost = "SELECT * FROM tblpost order by idpost desc";
    $sqlUser = "SELECT * FROM usuario where idusuario = \"$_SESSION[user_id]\"";
    $queryPost = $con->query($sqlPost);
    $queryUser = $con->query($sqlUser);
    $u = $queryUser->fetch_array();
}
?>
<!DOCTYPE html>
<html lang="ES">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	
    <title>Publicaciones</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
	<header>
		<h2 style="text-align: center;">Sistema de Publicaciones - Bienvenido <?php echo $u["1"]." ".$u["2"] ?></h2>
        <section>
            <nav>
                <ul>
                    <li><a href="./php/logout.php"><button class="btn btn-outline-success">Salir</button></a></li>
                </ul>
            </nav>
            <article>
                <div class="card mb-3">
                    <?php
                        while ($r=$queryPost->fetch_array()) {
                    ?>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo $r["5"]?>" class="img-fluid rounded-start" style="max-width: 350px; margin-top: 20px;">
                            <button type="submit" class="btn btn-primary" id="<?php echo $r["0"]?>" name="<?php echo $r["0"]?>" onclick="document.getElementById('id<?php echo $r[0] ?>').style.display='block'">Mas Información</button>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $r["1"] ?></h5>
                                <p class="card-text"><?php echo $r["3"] ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo $r["4"] ?></small></p>
                            </div>
                        </div>
                    </div>
                    <div id="id<?php echo $r["0"]?>" class="modal">
                        <div class="modal-content animate">
                            <div class="imgcontainer">
                                <span onclick="document.getElementById('id<?php echo $r[0] ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                                <br>
                            </div>
                            <div class="container">
                                <div class="card mb-3">                                  
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?php echo $r["5"]?>" class="img-fluid rounded-start" style="max-width: 350px;">
                                            <p class="card-text"><small class="text-muted"><?php echo $r["5"] ?></small></p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">POST #<?php echo $r["0"] ?></h5>
                                                <h5 class="card-title"><?php echo $r["1"] ?></h5>
                                                <p class="card-text"><?php echo $r["3"] ?></p>
                                                <p class="card-text"><?php echo $r["2"] ?></p>
                                                <p class="card-text"><small class="text-muted"><?php echo $r["4"] ?></small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </article>
        </section>
	</header>

	
	<div id="id01" class="modal">
        <div class="modal-content animate" >
            <div class="container">
            <div class="card mb-3">
                <?php
                    $sql = "SELECT * FROM tblpost where idpost = 2";
                    $query = $con->query($sql);
                    while ($r1=$query->fetch_array()) {
                ?>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo $r1["5"]?>" class="img-fluid rounded-start" style="max-width: 350px;">
                            <p class="card-text"><small class="text-muted"><?php echo $r1["5"] ?></small></p>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $r1["1"] ?></h5>
                                <p class="card-text"><?php echo $r1["3"] ?></p>
                                <p class="card-text"><?php echo $r1["2"] ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo $r1["4"] ?></small></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>	
</body>
</html>