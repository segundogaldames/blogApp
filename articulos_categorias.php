<?php 
require_once('class/session.php');
Session::init();

$categoria = (int) $_GET['id'];
//print_r($categoria);
require_once('class/articulo.php');
$art = new Articulo();
$art->getArticulosCategoria($categoria);

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
			<?php 
				$lista = $art->getArticulosCategoria($categoria);
				if($lista):
					foreach($lista as $list):?>
					<h3><?php echo $list['titulo']; ?></h3>
			
					<p class="text-justify"><?php echo $list['texto']; ?></p>
					<?php endforeach;?>
					<?php else:
					?>
					<p class="alert alert-danger">No hay articulos asociados</p>
				<?php endif;?>
		</div>	
	</div>
	
		<footer>
			<h5><?php include('parciales/footer.php'); ?></h5>
		</footer>
</div>	
</body>
</html>