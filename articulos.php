<?php
require_once('class/articulo.php');
require_once('class/comentario.php');

$art = new Articulo();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lista de Artículos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>	
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

		<!--Pagina que muestra todos los articulos y administrar-->
		<table class="table table-striped table-hover">
			<tr>
				<th>Titulo</th>
				<th>Fecha</th>
				<th>Categoría</th>
				<th>Acciones</th>
			</tr>
			<!--Ciclo para mostrar los registros de la tabla articulos-->
			<?php 
			$lista = $art->getArticulosCategoriaNombre();
			foreach($lista as $list): 
			?>
				<tr>
					<td><?php echo $list['titulo']; ?></td>
					<td><?php echo $list['fecha']; ?></td>
					<td><?php echo $list['categoria']; ?></td>
					<td>
						<a href="ver_articulo.php?id=<?php echo $list['id']; ?>">Ver</a>&nbsp;&nbsp;
						<a href="edit_articulo.php?id=<?php echo $list['id']; ?>">Editar</a>&nbsp;&nbsp;
						<a href="delete_articulo.php?id=<?php echo $list['id']; ?>">Eliminar</a>
					</td>
				</tr>
			<?php endforeach;?>
		</table>
		<p><a href="add_articulo.php?id=<?php echo $list['id']; ?>">Agregar Artículo</a></p>
		<div style="padding-top: 30px"></div>
		</div>	
	</div>
	
		<footer>
			<h5><?php include('parciales/footer.php'); ?></h5>
		</footer>
</div>				


</body>
</html>				