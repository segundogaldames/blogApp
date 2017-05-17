<?php 
require_once('class/categoria.php');
require_once('class/session.php');
Session::init();

if (isset($_POST['enviar']) && $_POST['enviar'] == 1) {
	//print_r($_POST);
	
	//se crea una instancia de la clase Categoria
	$cat = new Categoria();

	$nombre = strip_tags($_POST['nombre']);

	if (empty($nombre)) {
		$msg = "Debes ingresar el nombre de la categoria";
	}else {
		$cat->setCategorias($nombre);
	}
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
	<title>Nueva Categoría</title>
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
			<h3>Agregar Categorías</h3>

			<!--Se mostrara mensaje de error de validacion-->
			<?php if(isset($msg)): ?>
				<p class="alert alert-danger"><?php echo $msg; ?></p>
			<?php endif;?>

			<form action="" method="post">
				<div class="form-group">
					<label for="nombre">Ingrese Nombre</label>
					<input type="text" name="nombre" placeholder="Ingrese nombre de categoria" class="form-control">
				</div>
				<div class="form-group">
					<input type="hidden" name="enviar" value="1">
					<input type="submit" value="Guardar" class="btn btn-success">
				</div>
			</form>
		</div>	
	</div>
	
		<footer>
			<h5><?php include('parciales/footer.php'); ?></h5>
		</footer>
</div>	
</body>
</html>