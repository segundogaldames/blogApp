<?php
require_once('class/articulo.php');
require_once('class/comentario.php');
require_once('class/session.php');

Session::init();

$art = new Articulo();

if (isset($_GET['m'])) {
	if ($_GET['m'] == 'ok_set') {
		$msg = 'Se ha creado el articulo correctamente';
	}elseif ($_GET['m'] =='ok_del' ) {
		$msg = 'Se ha eliminado el articulo correctamente';
	}elseif ($_GET['m'] == 'ok_edit') {
		$msg = 'Se ha eliminado el articulo correctamente';
	}else{
		$alert = 'Las acciones solicitadas no se han podido realizar';
	}
}

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
		<?php if(isset($msg)):?>
			<p class="alert alert-success"><?php echo $msg; ?></p>
		<?php elseif(isset($alert)):?>
			<p class="alert alert-danger"><?php echo $alert; ?></p>
		<?php endif;?>
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