<?php
require_once('class/categoria.php');
require_once('class/articulo.php');
require_once('class/session.php');

if(isset($_POST['enviar']) && $_POST['enviar'] == 1){
	//print_r($_POST);
	$titulo = strip_tags($_POST['titulo']);
	$texto = strip_tags($_POST['texto']);
	$categoria = $_POST['categoria'];

	if(empty($titulo)){
		$msg = "Debe ingresar el título";
	}elseif(empty($texto)){
		$msg = "Debe ingresar un texto";
	}elseif(empty($categoria)){
		$msg = "Debe seleccionar una categoría";
	}else{
		$art = new Articulo();
		$art->setArticulos($titulo, $texto, $categoria);
	}

	$cat = new Categoria();
	$lista = $cat->getCategorias();
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
	<title>Nuevo Artículo</title>
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
			<h3>Agregar Artículos</h3>

			<!--Se mostrara mensaje de error de validacion-->
			<?php if(isset($msg)): ?>
				<p class="alert alert-danger"><?php echo $msg; ?></p>
			<?php endif;?>

			<form action="" method="post">
				<div class="form-group">
					<label for="nombre">Ingrese título</label>
					<input type="text" name="titulo" placeholder="Ingrese titulo del articulo" class="form-control">
				</div>
				<div class="form-group">
					<label for="nombre">Ingrese texto</label>
					<textarea name="texto" id="" rows="10" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="nombre">Seleccione categoría</label>
					<select name="categoria" id="" class="form-control">
						<option value="">Categorias</option>
						<?php foreach($lista as $list): ?>
							<option value="<?php echo $list['id'];?>"><?php echo $list['nombre'];?></option>
						<?php endforeach;?>
					</select>
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