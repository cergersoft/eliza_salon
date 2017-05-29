<?php
session_start();
//si hay una sesión
if (isset($_SESSION['session_username'])){
    //se muestra el contenido de la página web
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php print $_SESSION['session_username'];?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index1.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
      <a class="navbar-brand" href="home.php">lizsalon</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm">Pedir cita</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php print $_SESSION['session_username'];?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="logica/cerrar_sesion.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
            </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!--modal para iniciar sesión-->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm">
<div class="modal-content">
  <div class="modal-header">
   <h2>Pedir Cita</h2>
  </div>
  <div class="modal-body">
    <form action="logica/cita.php" method="post" enctype="application/x-www-form-urlencoded">
      <div class="form-group">
        <label for="control2_contraseña">Cita para el Dia:</label>
        <input type="date" name="dia" class="form-control" id="control1_nombre" required>
      </div>

      <div class="form-group">
        <label for="control2_contraseña">Hora:</label>
        <input type="time" name="hora" class="form-control hora " id="control1_contraseña" placeholder="Hora" required>
      </div>


      <div class="form-group">
  <label for="sel1" >Servicio</label>
  <select class="form-control" id="sel1" name="servicio">
    <OPTION VALUE="seleccionar" SELECTED>Seleccionar Servicio</OPTION>
    <option value="corte dama">Corte Dama</option>
    <option value="corte caballero">Corte Caballero</option>
    <option value="tintes">Tintes</option>
    <option value="cepillado">Cepillados</option>
    <option value="manicure/pedicure">Manicure / Pedicuure</option>
    <option value="maquillaje artistico">Maquillaje Artistico</option>
    <option value="maquillaje dia/noche">Maquillaje Dia/Noche</option>
    <option value="limpieza natural piel">Limpieza Natural Piel</option>
    <option value="repolarizacion">Repolarizacion</option>
    <option value="rayitos">Rayitos</option>
  </select>
</div>

        <input type="hidden" name="name" value="<?php echo $_SESSION['nombre']; ?>">
      <button type="submit" name="login" class="btn btn-success btn-block">Registrar Cita</button>
    </form>
  </div>
</div>
</div>
</div>


<article style="text-align: center;">
    <h1>¡Bienvenido <?php print $_SESSION['session_username'];?>!</h1>
</article>


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
<?php
}//si no hay sesión
else{
    //se redirecciona
    header ('location: ./');
}
?>
