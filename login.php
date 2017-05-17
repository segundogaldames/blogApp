<?php
require_once('class/usuario.php');
require_once('class/session.php');
Session::init();

$user = new Usuario();

if (isset($_POST['enviar']) && $_POST['enviar'] == 1) {
	//print_r($_POST);

	$usuario = strip_tags($_POST['usuario']);
	$password = strip_tags($_POST['password']);

	if (empty($usuario)) {
		$alert = 'Debe ingresar el usuario';
	}elseif (empty($password)) {
		$alert = 'Debe ingresar el password';
	}else{
		$row = $user->login($usuario, $password);
		if ($row) {
			Session::set('autenticado', true);
			Session::set('nom_usuario', $row['nombre']);
		}else{
			$alert = 'Usuario o contraseña no válidos';
		}
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
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

		<!--Se muestra mensaje si existe la variable msg-->
			<?php if(isset($msg)):?>
				<p class="alert alert-success"><?php echo $msg;?></p>
			<?php endif;?>
			<?php if(isset($alert)):?>
				<p class="alert alert-danger"><?php echo $alert;?></p>
			<?php endif;?>
			
			<?php if(@$row):?>
				<p class="alert alert-success"> <?php echo 'Bienvenido ' . Session::get('nom_usuario');?></p>
			<?php endif;?>

			<form action="" method="post">
				<div class="form-group">
					<label for="usuario">Nombre de usuario:</label>
					<input type="text" class="form-control" name="usuario">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<input type="hidden" name="enviar" value="1">
					<input type="submit" class="btn btn-success" value="Ingresar">
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