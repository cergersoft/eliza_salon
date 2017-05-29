<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LizSalon</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index1.css" rel="stylesheet">


</head>

  </head>
  <body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../">LizSalon</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm-cita">Pedir cita</a></li>
        <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm-Iniciar">Iniciar sesión</a></li>
        <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm-registrar">Registrate</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
      <!--modal para iniciar sesión-->
<div class="modal fade bs-example-modal-sm-Iniciar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
         <h2>Iniciar sesión</h2>
        </div>
        <div class="modal-body">
          <form action="logica/login.php" method="post" enctype="application/x-www-form-urlencoded">
            <div class="form-group">
              <input type="text" name="user" class="form-control" id="control1_nombre" placeholder="Usuario" required>
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" id="control1_contraseña" placeholder="Contraseña" required>
            </div>
            <button type="submit" name="login" class="btn btn-success btn-block">Entrar</button>
          </form>
        </div>
    </div>
  </div>
</div>
      <!--modal para registrarse-->
<div class="modal fade bs-example-modal-sm-registrar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
         <h2>Regístrate</h2>
        </div>
        <div class="modal-body">
          <form action="logica/regisuser.php" method="post" enctype="application/x-www-form-urlencoded">

            <div class="form-group">
              <input type="text" name="nom" class="form-control" id="control2_nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
              <input type="text" name="ape" class="form-control" id="control2_nombre" placeholder="Apellido" required>
            </div>
            <div class="form-group">
              <input type="mail" name="cor" class="form-control" id="control2_contraseña" placeholder="Correo" required>
            </div>
            <div class="form-group">
              <input type="text" name="cel" class="form-control" id="control2_nombre" placeholder="Celular" required>
            </div>
            <div class="form-group">
              <input type="text" name="usu" class="form-control" id="control2_nombre" placeholder="Usuario" required>
            </div>
            <div class="form-group">
              <input type="password" name="pas" class="form-control" id="control2_contraseña" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-success btn-block">Registrar</button>

          </form>
        </div>
    </div>
  </div>
</div>

<!-- modal cita -->

<div class="modal fade bs-example-modal-sm-cita" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
         <h2 class="labelmodal1">Pedir Cita</h2>
        </div>
        <div class="modal-body">
            <div class="form-group labelmodal">
            <label class="labelmodal">Registrate o Inicia Sesion </label>
            <label class="labelmodal"> para pedir tu cita </label>
            </div>
            <div class="form-group">
              <a href="iniciarsesion.php" class="sesion"> Iniciar sesión </a>
            </div>
            <div class="form-group">
              <a href="registrarse.php" class="register">Registrarse</a>
            </div>
        </div>
    </div>
  </div>
</div>



<!-- inicio carrusel -->
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <?php
require 'logica/conexion.php';
$active="active";

$sql_slider=mysql_query("SELECT * FROM banner where estado='activo'") or die (mysql_error());
$nums_slides=mysql_num_rows($sql_slider);
      ?>

<ol class="carousel-indicators">
          <?php
              for ($i=0; $i<$nums_slides; $i++){
              $active="active";
              ?>
              <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" class="<?php echo $active;?>"></li>
              <?php $active=""; } ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <?php
	$active="active";
	while ($row=mysql_fetch_array($sql_slider)){
      ?>

            <div class="item <?php echo $active;?>">
              <img src="./img_banner/<?php echo $row['img_banner'];?>" alt="Chania" width="460" height="345">
              <div class="carousel-caption">
              <h3><?php echo $row['titulo'];?></h3>
		          <p><?php echo $row['descripcion'];?></p>
            </div>
            </div>

          <?php $active=""; } ?>


    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- fin carrusel -->

<div class="footer">

  <div class="divfoot">
<footer class="footliz">
<label>LizSalon salon de belleza</label>
</footer>
<footer class="footliz">
<label>Direccion:</label>
</footer>
<footer class="footliz">
<label>Celular:</label>
<label class="footmerp"><a target="_blank" href="http://merchussoftweb.eshost.com.ar/">&copy; Company 2016 MerchusSoft</a></label>
</footer>
</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
