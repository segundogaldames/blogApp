<?php
//include_once('../class/session.php');
//Session::init();
?>
<nav class="navbar navbar-reverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">MyBlog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">Nosotros</a></li>
        <li><a href="#">Noticias</a></li>
        <li><a href="#">Contacto</a></li>
        <?php if(Session::get('autenticado')):?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrar <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Administrar Categorías</a></li>
            <li><a href="add_categoria.php">Agregar Categorías</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="articulos.php">Administrar Artículos</a></li>
            <li><a href="add_articulo.php">Agregar Artículos</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="comentarios.php">Administrar Comentarios</a></li>
          </ul>
        </li>
        <?php endif;?>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <?php if(!Session::get('autenticado')):?>
        <li><a href="login.php">Iniciar Sesión</a></li>      
        <li><a href="addUsuario.php">Registrarse</a></li>
       <?php else:?>
          <li><a href="logout.php">Cerrar Sesión</a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
        <?php endif;?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>