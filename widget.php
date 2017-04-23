<?php
//script que muestra errores de php en tiempo de ejecucion
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('class/categoria.php');

//Creamos una instancia de la clase Categoria
$cat = new Categoria();

//Utilizamos el metodo getCategorias de la clase y almacenamos el valor en la variable $lista
$lista = $cat->getCategorias();

?>
<div class="widget">
	<ul class="list-unstyled">
	
	<!--Utilizamos el ciclo foreach para mostrar los datos-->
	<?php foreach($lista as $list): ?>
	<li><a href="articulos_categorias.php?id=<?php echo $list['id'];?>"><?php echo $list['nombre']; ?></a></li>
	<?php endforeach;?>
</ul>
</div>
