<?php
require_once('database.php');

//clase que hereda de PDO y servira de interface para realizar consultas SQL
class Model extends PDO
{
	protected $_db;

	public function __construct(){
		$this->_db = new Database; //creacion de instancia de la clase Database. Colaboracion de objetos
	}
}