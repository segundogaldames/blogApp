<?php
require_once('class/usuario.php');
if (isset($_POST['enviar']) && $_POST['enviar'] == 1)
{
	# code...
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
	<link rel="stylesheet" href="css/registro_usuario.css">
	<!-- Website Font style -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
	<title>Nuevo Usuario</title>
</head>
<body>
	<div class="container">
		<header>
		<?php include('parciales/cabecera.php'); ?>
		<?php include('parciales/menu.php'); ?>
	</header>

	<div class="row">

		<div class="col-md-12">
			<h3>Registrar usuario</h3>

			<!--Se mostrara mensaje de error de validacion-->
			<?php if(isset($msg)): ?>
				<p class="alert alert-danger"><?php echo $msg; ?></p>
			<?php endif;?>

			<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Nombre:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Nombre"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Usuario</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Usuario"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Clave</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Clave"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Repetir la clave</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Repetir la clave"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<input type="hidden" name="enviar" value="1">
							<button type="button" class="btn btn-primary btn-lg btn-block login-button">Registrar</button>
						</div>

					</form>
				</div>
		</div>
	</div>

		<footer>
			<h5><?php include('parciales/footer.php'); ?></h5>
		</footer>
</div>
</body>
</html>
