<?php
require_once('model.php');

class Articulo extends Model
{
	private $_titulo;
	private $_texto;
	private $_categoria;

	//metodo que inserta articulos en la tabla articulos
	public function setArticulos($titulo, $texto, $categoria){
		//asignacion de datos de las variables a los atributos
		$this->_titulo = $titulo;
		$this->_texto = $texto;
		$this->_categoria = $categoria;

		$art = $this->_db->prepare("INSERT INTO articulos VALUES(null,?,?,now(),?)");
		$art->bindParam(1, $this->_titulo);
		$art->bindParam(2, $this->_texto);
		$art->bindParam(3, $this->_categoria);
		$art->execute();
	}
}