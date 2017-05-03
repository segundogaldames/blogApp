<?php
require_once('class/categoria.php');

if (isset($_GET['id'])) {
	$id = (int) $_GET['id'];

	$cat = new Categoria();
	$cat->deleteCategoria($id);
}
