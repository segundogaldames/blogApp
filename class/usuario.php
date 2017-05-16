<?php
require_once('model.php');

class Usuario extends Model
{
	public function addUsuario($nombre, $usuario, $email, $password)
	{
		$usu = $this->_db->prepare("INSERT INTO usuarios VALUES(null, ?, ?, ?, ?)");
		$usu->bindParam(1, $nombre);
		$usu->bindParam(2, $usuario);
		$usu->bindParam(3, $email);
		$usu->bindParam(4, $password);
		$usu->execute();

		//Pendiente:
		//Mensaje de registro
		//Validar registro unico
		//Formulario de registro
	}

	public function login($usuario, $password)
	{
		$log = $this->_db->prepare("SELECT nombre, usuario FROM usuarios WHERE usuario = ? AND password = ?");
		$log->bindParam(1, $usuario);
		$log->bindParam(2, $password);
		$log->execute();
		//Pendiente:
		//Formulario de login
	}

}
