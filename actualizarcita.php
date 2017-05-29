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
            <li><a href="#">Banner</a></li>
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
    date_default_timezone_set('America/Mexico_City');
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

    <div class="col-md-9">
<h3>Citas del dia <?php echo date("d-m-Y"); ?> </h3>

<hr>

<div class="table-responsive">
      <table class="table table-striped">
   <thead>
     <tr>
       <th>Hora</th>
       <th>Fecha</th>
       <th>Servicio</th>
       <th>Cliente</th>
       <th>Estado</th>
       <th></th>
     </tr>
   </thead>
<form action="logica/editarcitas.php" method="post" class="form-register" enctype="multipart/form-data">
   <?php
require 'logica/conexion.php';

$con=mysql_connect($server,$username,$password)or die("problemas al conectar al servidor");
        mysql_select_db($db,$con)or die("no existe la base de datos");

$re = mysql_query("SELECT `dia_cita`, `hora_cita`, `servicios`, `cliente`, `estado` FROM `tabla_citas` WHERE id_cita = ".$_GET['editar'].";");
        while ($row=mysql_fetch_array($re)){ ?>

   <tbody>
     <tr>
       <td><input type="text" name="hora_cita" value="<?php echo $row['hora_cita'];?>"></td>
       <td><input type="text" name="dia_cita" value="<?php echo $row['dia_cita'];?>"></td>
       <td><?php echo $row['servicios'];?></td>
       <td><?php echo $row['cliente'];?></td>
       <td>
       
       <select NAME="estado" class="input-52">
            <OPTION SELECTED><?php echo $row['estado'];?></OPTION>
            <OPTION VALUE="atendido">Atendido</OPTION>
            <OPTION VALUE="cancelado">Cancelado</OPTION>
 		</select>
       
       </td>
       
       <td><input type="submit" value="Actualizar" class="btn btn-success"></td>
       
     </tr>
     
     <?php } ?>
    	<input type="hidden" name="id" value=<?php echo '"'.$_GET['editar'].'"'; ?>>
</form>

   </tbody>

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
