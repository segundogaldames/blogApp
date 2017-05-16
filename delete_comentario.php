<?php
require_once('class/comentario.php');

if (isset($_GET['id'])) {
	$id = (int) $_GET['id'];

	$com = new Comentario();
	$com->deleteComentario($id);
}
