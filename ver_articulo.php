<?php 
require_once('class/articulo.php');
$art = new Articulo();

if(isset($_GET['id'])){
	$id = (int) $_GET['id'];
	//print_r($id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<title>Ver Artículo</title>
</head>
<body>
	<div class="container">
		<header>
		<?php include('parciales/cabecera.php'); ?>
		<?php include('parciales/menu.php'); ?>
	</header>
	
	<div class="row">

		<div class="col-md-4">
			<?php include('widget.php'); ?>
		</div>
		<div class="col-md-8">
			<!--Pagina que muestra los datos asociados a un articulo-->
			<?php
			$dato = $art->getArticulosId($id);
			?>
			<h3>Título: <?php echo $dato['titulo']; ?></h3>
			<p><strong>Texto:</strong> <?php echo $dato['texto']; ?></p>
			<p><strong>Publicado:</strong> <?php echo $dato['fecha']; ?></p>
			<p><strong>Categoría:</strong> <?php echo $dato['categoria']; ?></p>

			<div style="padding-top: 30px"></div>
			<a href="articulos.php">Volver</a>&nbsp;|&nbsp;
			<a href="edit_articulo.php?id=<?php echo $id; ?>">Editar</a>
			<div style="padding-top: 30px"></div>
		</div>	
	</div>
	
		<footer>
			<h5><?php include('parciales/footer.php'); ?></h5>
		</footer>
</div>	
</body>
</html>