<?php
require_once('class/articulo.php');
require_once('class/comentario.php');
require_once('class/session.php');

Session::init();

//print_r(Session::get('nom_usuario'));

//Validamos si la variable $m enviada desde el servidor existe y si su valor es ok
if(isset($_GET['m']) && $_GET['m'] == 'ok'){
	$msg = "La categoria se ha ingresado correctamente";
}
$art = new Articulo();
$com = new Comentario();

if (isset($_POST['enviar']) && $_POST['enviar'] == 1) {
	//print_r($_POST);exit;
	$comentario = strip_tags($_POST['comentario']);
	$articulo = (int) $_POST['articulo'];
	//print_r($comentario);exit;
	
	if (empty($comentario)) {
		$mensaje = 'No comentaste. Inténtalo de nuevo';
	}elseif (empty($articulo)) {
		$mensaje = 'Dato inválido. Inténtalo de nuevo';
	}else{
		$com->setComentarios($comentario, $articulo);
	}
}

//print_r($lista);exit;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Portada</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".form").hide();
			$("#comenta").on("click", function(){
				$(".form").show();
			});
		});
	</script>
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
		<?php if(isset($mensaje)):?>
			<p class="alert alert-success"><?php echo $mensaje; ?></p>
		<?php endif;?>
		<?php 
			$lista = $art->getArticulos();
			foreach($lista as $list):?>
			<h3><?php echo $list['titulo']; ?></h3>
			
			<p class="text-justify"><?php echo $list['texto']; ?></p>
			
			<?php 
			$comment = $com->getComentariosArticulos($list['id']); 
			foreach($comment as $comment):
			?>
				<div class="col-md-12 col-md-offset-1">
					<p><em><?php echo $comment['texto']; ?></em></p>
				</div>
				
			<?php endforeach;?>

			<div class="form-group">
				<input type="submit" class="btn btn-primary btn-sm" value="Comentar" id="comenta">
			</div>
				
			<form action="" class="form" method="post">
				<div class="form-group">
					<label for="comentario">Comenta este artículo:</label>
					<textarea name="comentario" id="" rows="5" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<input type="hidden" name="articulo" value="<?php echo $list['id'];?>">
					<input type="hidden" name="enviar" value="1">
					<input type="submit" value="Enviar" class="btn btn-success">
				</div>
			</form>
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