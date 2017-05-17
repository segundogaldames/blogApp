<?php
require_once('class/articulo.php');
require_once('class/comentario.php');

$com = new Comentario();

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
				<th>Texto</th>
				<th>Fecha</th>
				<th>Artículo</th>
				<th>Acciones</th>
			</tr>
			<!--Ciclo para mostrar los registros de la tabla articulos-->
			<?php 
			$lista = $com->getComentarios();
			foreach($lista as $list): 
			?>
				<tr>
					<td><?php echo $list['texto']; ?></td>
					<td><?php echo $list['fecha']; ?></td>
					<td><?php echo $list['titulo']; ?></td>
					<td>
						<a href="edit_comentario.php?id=<?php echo $list['id']; ?>">Editar</a>&nbsp;&nbsp;
						<a href="delete_comentario.php?id=<?php echo $list['id']; ?>">Eliminar</a>
					</td>
				</tr>
			<?php endforeach;?>
		</table>
		<div style="padding-top: 30px"></div>
		</div>	
	</div>
	
		<footer>
			<h5><?php include('parciales/footer.php'); ?></h5>
		</footer>
</div>				


</body>
</html>				