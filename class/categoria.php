<?php
require_once('model.php');

class Categoria extends Model
{
	private $_nombre;

	//metodo para mostrar las categorias en el widget.php
	public function getCategorias(){
		//consulta SQL
		$cat = $this->_db->query("SELECT id, nombre FROM categorias order by nombre ASC");

		//retorno de valor
		//el metodo fetchall de PDO retorna todos los registros que esten en categorias
		return $cat->fetchall();
	}

	//metodo para ingresar categorias a la tabla categorias
	public function setCategorias($nombre){
		//print_r($nombre);
		$this->_nombre = $nombre;
		
		//procedimiento para ingresar datos a la tabla categorias
		//validando que los datos esten correctos
		//cada signo de interrogacion representa un dato
		//el numero en bindParam representa la posicion del signo en la consulta SQL
		$cat = $this->_db->prepare("INSERT INTO categorias values(null, ?)");
		$cat->bindParam(1, $this->_nombre);
		$cat->execute();

		//se envia mensaje de confirmacion de ingreso del dato 
		$msg_confirm = "ok";
		//Se redirecciona al index con la variable msg_confirm
		header('Location: index.php?m=' . $msg_confirm);

	}
}