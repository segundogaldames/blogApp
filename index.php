<?php
require_once('class/articulo.php');


//Validamos si la variable $m enviada desde el servidor existe y si su valor es ok
if(isset($_GET['m']) && $_GET['m'] == 'ok'){
	$msg = "La categoria se ha ingresado correctamente";
}

$art = new Articulo();

//print_r($lista);exit;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<title>Portada</title>
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

		<!--Se muestra mensaje si existe la variable msg-->
		<?php if(isset($msg)):?>
			<p class="alert alert-success"><?php echo $msg; ?></p>
		<?php endif;?>
		<?php 
			$lista = $art->getArticulos();
			foreach($lista as $list):?>
			<h3><?php echo $list['titulo']; ?></h3>
			
			<p class="text-justify"><?php echo $list['texto']; ?></p>
			
			<input type="submit" value="Comentar" class="btn btn-primary btn-sm">
			<hr>
		<?php endforeach;?>
		</div>	
	</div>
	
		<footer>
			<h5><?php include('parciales/footer.php'); ?></h5>
		</footer>
</div>				


</body>
</html>				