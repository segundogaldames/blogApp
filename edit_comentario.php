<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('class/categoria.php');
require_once('class/comentario.php');

$com = new Comentario();



if(isset($_GET['id'])){
	$id = (int) $_GET['id'];
	//print_r($id);
}

if (isset($_POST['enviar'])  && $_POST['enviar'] == 1) {
	$texto = strip_tags($_POST['texto']);
	$id = (int) $_POST['id_com'];

	//print_r($_POST);exit;

	if (empty($texto)) {
		$alert = "Debe ingresar un comentario";
	}else{
		$com->editComentario($id, $texto, $fecha);
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
	<title>Editar Comentario</title>
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
			<!--Pagina que edita los datos asociados a un articulo-->
			<?php if(isset($alert)):?>
				<p class="alert alert-danger"><?php echo $alert; ?></p>
			<?php endif;?>
			<?php
			$dato = $com->getComentariosId($id);
			?>

			<form action="" method="post">
				<div class="form-group">
					<label for="texto">Texto:</label>
					<textarea name="texto" id="" rows="5" class="form-control"><?php echo $dato['texto'];?></textarea>
				</div>
				<div class="form-group">
					<input type="hidden" name="id_com" value="<?php echo $id;?>">
					<input type="hidden" name="enviar" value="1">
					<input type="submit" value="Actualizar" class="btn btn-success">
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
