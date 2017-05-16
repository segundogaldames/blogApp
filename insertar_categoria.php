<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
			<form action="" method="post">
				<div class="form-group">
					<label class="" for="nombre">Ingrese Nombre</label>
					<input class="form-control" type="text" name="nombre" placeholder="Ingrese nombre">
				</div>
				<div class="form-group">
					<input type="hidden" name="enviar" value="1">
					<input type="submit" value="Guardar" class="btn btn-success">
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