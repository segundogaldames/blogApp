<?php
require_once('config.php');

//clase que hereda de PDO y utiliza los parametros de config.php para conectar la base
class Database extends PDO
{
	public function __construct(){
        //llamada al constructor de la clase padre (PDO) para inicializar las variables de la base de datos
		parent::__construct(
                'mysql:host=' . DB_HOST .
                ';dbname=' . DB_NAME,
                DB_USER, 
                DB_PASS, 
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . DB_CHAR
                    ));
	}
}