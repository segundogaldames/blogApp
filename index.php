<?php
//Validamos si la variable $m enviada desde el servidor existe y si su valor es ok
if(isset($_GET['m']) && $_GET['m'] == 'ok'){
	$msg = "La categoria se ha ingresado correctamente";
}
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

			<h3>Título Artículo</h3>
			<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae qui alias voluptas reiciendis delectus molestiae officiis perferendis vitae rem inventore, iusto adipisci mollitia expedita, sint similique, voluptatibus explicabo? Vero, sunt</p>
			<input type="submit" value="Comentar" class="btn btn-primary btn-sm">
			<hr>
		</div>	
	</div>
	
		<footer>
			<h5><?php include('parciales/footer.php'); ?></h5>
		</footer>
</div>				


</body>
</html>				