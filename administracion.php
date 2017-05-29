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
      <a class="navbar-brand" href="administracion.php">lizsalon</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

    <ul class="nav navbar-nav">

            <li class="active"><a href="administracion.php">Citas</a></li>
            <li><a href="adminbanner.php">Banner</a></li>
            <li><a href="#">admin Banner</a></li>

</ul>

      <ul class="nav navbar-nav navbar-right">
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

<?php

    include ("logica/conexion.php");

    $fechaEnCurso= date("Y-m-d");
      $consulta="SELECT * FROM `tabla_citas` WHERE `dia_cita`='".$fechaEnCurso."' ORDER BY hora_cita;";
      $hacerConsulta=mysql_query($consulta, $conexcitas);
      $numeroDeCitasDelDia=mysql_num_rows($hacerConsulta);
    ?>

<div class="container">
  <div class="row">

    <div class="col-md-3">
<h3>Citas del dia: <span class="label label-primary"><?php echo $numeroDeCitasDelDia; ?></span></h3>

    </div>

    <div class="col-md-7">
<h3>Citas del dia <?php echo date("d-m-Y"); ?> </h3>

<hr>

<div class="table-responsive">
      <table class="table table-striped">
   <thead>
     <tr>
       <th>Hora</th>
       <th>Servicio</th>
       <th>Cliente</th>
       <th>Estado</th>
       <th>Factura</th>
       <th>Actualizar</th>
       <th>Eliminar</th>
     </tr>
   </thead>

   <?php
require 'logica/conexion.php';

$re=mysql_query("SELECT * FROM tabla_citas WHERE `dia_cita`='".$fechaEnCurso."' ORDER BY hora_cita") or die (mysql_error());

while ($row=mysql_fetch_array($re)){ ?>

   <tbody>
     <tr>
       <td><?php echo $row['hora_cita'];?></td>
       <td><?php echo $row['servicios'];?></td>
       <td><?php echo $row['cliente'];?></td>
       <td><?php echo $row['estado'];?></td>
       <center><td><a href="./imprimir/factura.php?editar=<?php echo $row['id'];?>"class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a></td></center>
       <center><td> <a href="./actualizarcita.php?editar=<?php echo $row['id_cita'];?>"class="btn btn-warning"><span class="glyphicon glyphicon-refresh"></span></a> </td></center>
       <center><td> <a href="logica/eliminarCita.php?eliminar=<?php echo $row['id_cita'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a> </td></center>
     </tr>

   </tbody>

   <?php
   		}
  ?>

 </table>
</div>
    </div>



</div>
</div>


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
