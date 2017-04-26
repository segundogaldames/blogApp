<?php
require_once('model.php');

class Comentario extends Model
{
	private $_texto;
	private $_articulo;

	public function getComentariosArticulos($articulo){
		$this->_articulo = (int) $articulo;

		$com = $this->_db->prepare("SELECT texto FROM comentarios WHERE articulo_id = ?");
		$com->bindParam(1, $this->_articulo);
		$com->execute();

		return $com->fetchall();
	}

	public function setComentarios($comentario, $articulo){
		//print_r($comentario);exit;
		$this->_texto = $comentario;
		$this->_articulo = (int) $articulo;

		$com = $this->_db->prepare("INSERT INTO comentarios VALUES(null, ?, now(), ?)");
		$com->bindParam(1, $this->_texto);
		$com->bindParam(2, $this->_articulo);
		$com->execute();
	}
}