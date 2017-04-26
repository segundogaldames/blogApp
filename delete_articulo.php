<?php 
require_once('class/articulo.php');

if (isset($_GET['id'])) {
	$id = (int) $_GET['id'];

	$art = new Articulo();
	$art->deleteArticulo($id);
}
