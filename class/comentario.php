<?php
require_once('model.php');

class Comentario extends Model
{
	private $_texto;
	private $_articulo;

	//metodo para rescatar comentarios por articulos
	public function getComentariosArticulos($articulo){
		$this->_articulo = (int) $articulo;

		$com = $this->_db->prepare("SELECT texto FROM comentarios WHERE articulo_id = ?");
		$com->bindParam(1, $this->_articulo);
		$com->execute();

		return $com->fetchall();
	}

	//metodo para ingresar comentarios
	public function setComentarios($comentario, $articulo){
		//print_r($comentario);exit;
		$this->_texto = $comentario;
		$this->_articulo = (int) $articulo;

		$com = $this->_db->prepare("INSERT INTO comentarios VALUES(null, ?, now(), ?)");
		$com->bindParam(1, $this->_texto);
		$com->bindParam(2, $this->_articulo);
		$com->execute();
	}

	public function getComentarioArticulo()
	{
		$com = $this->_db->query("SELECT c.id as id, c.texto as titulo, c.fecha as fecha, a.titulo as articulo FROM comentarios as c INNER JOIN articulos as a ON c.articulo_id = a.id ORDER BY fecha");
		return $com->fetchall();
	}

	public function getComentariosId($id)
	{
		$com = $this->_db->prepare("SELECT c.texto as texto, c.fecha as fecha, a.titulo as articulo FROM comentarios as c INNER JOIN articulos as a ON c.articulo_id = a.id	WHERE c.id = ?");
		$com->bindParam(1, $id);
		$com->execute();

		return $com->fetch();
	}

	public function editComentario($id, $texto, $fecha)
	{
		$id = (int) $id;

		$com = $this->_db->prepare("UPDATE comentarios SET texto = ?, fecha = now() WHERE id = ?");
		$com->bindParam(1, $texto);
		$com->bindParam(2, $id);
		$com->execute();

		header('Location: comentarios.php');

	}

	public function deleteComentario($id)
	{
		$id = (int) $id;

		$com = $this->_db->prepare("DELETE FROM comentarios WHERE id = ?");
		$com->bindParam(1, $id);
		$com->execute();

		header('Location: comentarios.php');
	}
}
