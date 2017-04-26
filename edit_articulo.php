<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('class/articulo.php');
require_once('class/categoria.php');

$art = new Articulo();



if(isset($_GET['id'])){
	$id = (int) $_GET['id'];
	//print_r($id);
}

if (isset($_POST['enviar'])  && $_POST['enviar'] == 1) {
	$titulo = strip_tags($_POST['titulo']);
	$texto = strip_tags($_POST['texto']);
	$categoria = (int) $_POST['categoria'];
	$id = (int) $_POST['id_art'];

	//print_r($_POST);exit;

	if (empty($titulo)) {
		$alert = "Debe ingresar un titulo";
	}elseif (empty($texto)) {
		$alert = "Debe ingresar un texto";
	}elseif (empty($categoria)) {
		$alert = "Debe seleccionar una categoria";
	}elseif (empty($id)) {
		$alert = "No hay un artículo asociado";
	}else{
		$art->editArticulo($id, $titulo, $texto, $categoria);
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
	<title>Editar Artículo</title>
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
			<?php $dato = $art->getArticulosId($id);?>
			
			<form action="" method="post">
				<div class="form-group">
					<label for="titulo">Título:</label>
					<input type="text" name="titulo" value="<?php echo $dato['titulo'];?>" class="form-control">
				</div>
				<div class="form-group">
					<label for="texto">Texto:</label>
					<textarea name="texto" id="" rows="5" class="form-control"><?php echo $dato['texto'];?></textarea>
				</div>
				<div class="form-group">
					<label for="categoria">Categoria actual: <?php echo $dato['categoria'];?></label>
					<?php 
					$cat = new Categoria();
					$cate = $cat->getCategorias();
					?>
					<select name="categoria" id="" class="form-control">
						<option value="">Categorías</option>
						<?php foreach($cate as $cate):?>
							<option value="<?php echo $cate['id'];?>"><?php echo $cate['nombre'];?></option>
						<?php endforeach;?>
					</select>
				</div>
				<div class="form-group">
					<input type="hidden" name="id_art" value="<?php echo $id;?>">
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