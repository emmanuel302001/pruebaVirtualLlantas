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
		<h2 style="text-align: center;">Sistema de Publicaciones</h2>
        <section>
            <nav>
                <ul>
                    <li><button class="btn btn-outline-success" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Ingresar</button></li>
                </ul>
            </nav>
            <article>
                <form method="POST" name="crearpost" id="crearpost" action="php/crearPost.php">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" required>
                        <label for="floatingInput">Titulo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="imagen" name="imagen" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Contenido</label>
                        <textarea class="form-control" id="contenido" name="contenido" rows="3" required></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary g-recaptcha" data-sitekey="6Lf2NCshAAAAAGiPicsjWEqxNhWW_1EgB0DWPmZO" data-callback='onSubmit' data-action='submit'>Guardar</button>
                    </div>
                </form>
                <div class="card mb-3">
                    <?php
                        $data = json_decode(file_get_contents("http://localhost/pruebaVirtualLlantas/api/publicaciones.php?user=admin&pass=1234"), true);
                        for ($i=0; $i < count($data); $i++) {
                    ?>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo $data[$i]["urlimagen"]?>" class="img-fluid rounded-start" style="max-width: 350px; margin-top: 20px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data[$i]["titulopost"] ?></h5>
                                <p class="card-text"><?php echo $data[$i]["descripcion"] ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo $data[$i]["fechacre"] ?></small></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </article>
        </section>
	</header>

	
	<div id="id01" class="modal">
        <form class="modal-content animate" name="login" action="php/login.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="imagenes/login.png" alt="Avatar" class="avatar" style="width: 200px; height: 200px;">
            </div>
            <div class="container">
                <label for="username">Nombre de usuario</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required>

                <label for="password">Contraseña</label>
                <input type="password"id="password" name="password" placeholder="Contraseña" required>
            </div>
            
            <div class="container" style="background-color:#f1f1f1">
                <button type="submit" class="btn btn-outline-success">Acceder</button>
            </div>
        </form>
    </div>

	<script>
		var modal = document.getElementById('id01');
		window.onclick = function(event) {
    	    if (event.target == modal) {
      	        modal.style.display = "none";
    	    }
		}

        function onSubmit(token) {
            document.getElementById("crearpost").submit();
        }
	</script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>	
</body>
</html>