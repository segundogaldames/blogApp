<?php
require_once('model.php');
require_once('hash.php');
require_once('config.php');

class Usuario extends Model
{
	public function getUsuarioId($usuario){
		$usu = $this->_db->prepare("SELECT id FROM usuarios WHERE usuario = ?");
		$usu->bindParam(1, $usuario);
		$usu->execute();

		return $usu->fetch();
	}

	public function login($usuario, $password){
		//print_r($password);exit;

		$usu = $this->_db->prepare("SELECT id, nombre, usuario FROM usuarios WHERE usuario = ? AND password = ?");
		$usu->bindParam(1, $usuario);
		$usu->bindParam(2, Hash::getHash('sha1', $password, HASH_KEY));
		$usu->execute();

		return $usu->fetch();	
	}

	public function addUsuario($nombre, $usuario, $email, $password){
		$algoritmo = 'sha1';
		$usu = $this->_db->prepare("INSERT INTO usuarios VALUES(null, ?, ?, ?, ?)");
		$usu->bindParam(1, $nombre);
		$usu->bindParam(2, $usuario);
		$usu->bindParam(3, $email);
		$usu->bindParam(4, Hash::getHash($algoritmo, $password, HASH_KEY));
		$usu->execute();
	}
}