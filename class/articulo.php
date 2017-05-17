<?php
require_once('model.php');

class Articulo extends Model
{
	private $_titulo;
	private $_texto;
	private $_categoria;

	//metodo para mostrar todos los articulos
	public function getArticulos(){
		$art = $this->_db->query("SELECT id, titulo, texto FROM articulos ORDER BY fecha DESC");
		return $art->fetchall();
	}

	//metodo que recupera todas los articulos y muestra el nombre de la categoria al que pertence cada uno
	public function getArticulosCategoriaNombre(){

		//consulta con INNER JOIN para traer datos comparando dos tablas
		$art = $this->_db->query("SELECT a.id as id, a.titulo as titulo, a.fecha as fecha, c.nombre as categoria FROM categorias as c INNER JOIN articulos as a ON a.categoria_id = c.id ORDER BY fecha");
		return $art->fetchall();
	}

	//metodo que muestra un articulo segun id recibido desde articulos.php
	public function getArticulosId($id){
		$art = $this->_db->prepare("SELECT a.titulo as titulo, a.fecha as fecha, a.texto as texto, c.nombre as categoria FROM categorias as c INNER JOIN articulos as a ON a.categoria_id = c.id
			WHERE a.id = ?");
		$art->bindParam(1, $id);
		$art->execute();

		return $art->fetch();
	}

	//metodo que muestra articulos por categoria
	public function getArticulosCategoria($categoria){
		$art = $this->_db->prepare("SELECT id, titulo, texto FROM articulos WHERE categoria_id = ?");
		$art->bindParam(1, $categoria);
		$art->execute();
		return $art->fetchall();
	}

	//metodo para editar un articulo
	public function editArticulo($id, $titulo, $texto, $categoria){
		$id = (int) $id;

		$art = $this->_db->prepare("UPDATE articulos SET titulo = ?, texto = ?, fecha = now(), categoria_id = ? WHERE id = ?");
		$art->bindParam(1, $titulo);
		$art->bindParam(2, $texto);
		$art->bindParam(3, $categoria);
		$art->bindParam(4, $id);
		$art->execute();

		$msg_confirm = 'ok_edit';
		header('Location: articulos.php?m=' . $msg_confirm);
	}

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

		$msg_confirm = "ok_set";
		header('Location: articulos.php?m=' . $msg_confirm);
	}

	public function deleteArticulo($id){
		$id = (int) $id;

		$art = $this->_db->prepare("DELETE FROM articulos WHERE id = ?");
		$art->bindParam(1, $id);
		$art->execute();

		$msg_confirm = 'ok_del';
		header('Location: articulos.php?m=' . $msg_confirm);
	}
}