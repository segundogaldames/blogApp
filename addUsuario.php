<?php 
require_once('class/session.php');
require_once('class/usuario.php');
Session::init();

$user = new Usuario();

if (isset($_POST['enviar']) && $_POST['enviar'] == 1) {
	//print_r($_POST);
	$nombre = strip_tags($_POST['nombre']);
	$usuario = strip_tags($_POST['usuario']);
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	$repassword = strip_tags($_POST['repassword']);

	if (empty($nombre)) {
		$alert = 'Debe ingresar el nombre';
	}elseif (empty($usuario)) {
		$alert = 'Debe ingresar el usuario';
	}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$alert = 'Debe ingresar el email';
	}elseif (empty($password)) {
		$alert = 'Debe ingresar el password';
	}elseif ($password != $repassword) {
		$alert = 'Los passwords no coiciden';
	}else{	
		$row = $user->getUsuarioId($usuario);
		if ($row) {
			$alert = 'El usuario ya existe. Intente con otro';
		}else{
			$user->addUsuario($nombre,$usuario,$email,$password);
			$row = $user->getUsuarioId($usuario);
			if ($row) {
				$mensaje = 'Usted se ha registrado satisfactoriamente';
			}
		}
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
	<title>Nuevo Usuario</title>
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
			<h3>Agregar Usuario</h3>

			<!--Se mostrara mensaje de error de validacion-->
			<?php if(isset($alert)):?>
				<p class="alert alert-danger"><?php echo $alert;?></p>
			<?php endif;?>
			<?php if(isset($mensaje)):?>
				<p class="alert alert-success"><?php echo $mensaje;?></p>
			<?php endif;?>

			<form action="" method="post">
				<div class="form-group">
					<label for="nombre">Ingrese Nombre</label>
					<input type="text" name="nombre" placeholder="Ingrese nombre" class="form-control" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre']; ?>">
				</div>
				<div class="form-group">
					<label for="usuario">Ingrese Nombre de Usuario:</label>
					<input type="text" name="usuario" placeholder="Ingrese usuario" class="form-control" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario']; ?>">
				</div>
				<div class="form-group">
					<label for="email">Ingrese Email:</label>
					<input type="text" name="email" placeholder="Ingrese email" class="form-control" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
				</div>
				<div class="form-group">
					<label for="password">Ingrese Password:</label>
					<input type="password" name="password" placeholder="Ingrese password" class="form-control">
				</div>
				<div class="form-group">
					<label for="repassword">Reingrese Password:</label>
					<input type="password" name="repassword" placeholder="reingrese password" class="form-control">
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