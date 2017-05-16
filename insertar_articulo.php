<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Insertar Articulo</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<header>
		<?php include('parciales/cabecera.php'); ?>
		<?php include('parciales/menu.php'); ?>
		<nav></nav>
	</header>
	<div class="row">
		<aside class="col-md-4">
			Enlaces de categorias	
		</aside>
		<section class="col-md-8">
			<form action="">
				<div class="form-group">
					<label for="titulo">Titulo:</label>
					<input class="form-control" type="text">
				</div>
				<div class="form-group">
					<label for="contenido">Contenido:</label>
					<textarea class="form-control" name="contenido" id="" cols="30" rows="10"></textarea>
				</div>
				<div class="form-group">
					<input class="btn btn-info" type="submit" value="Publicar">
					<input class="btn btn-default" type="submit" value="Guardar">
				</div>
			</form>
		</section>
	</div>
	<div class="row">
		<footer class="footer">
			Píe de página
		</footer>
	</div>
</div>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
</body>
</html>