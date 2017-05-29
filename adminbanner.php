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
    <link href="css/banneradmin.css" rel="stylesheet">
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

            <li><a href="administracion.php">Citas</a></li>
            <li class="active"><a href="adminbanner.php">Banner</a></li>
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



<div class="container">
  <div class="row">

    <div class="col-md-6 table-responsive">

      <table class="table">
    <thead>
      <tr>
        <th>TITULO</th>
        <th>DESCRIPCION</th>
        <th>ESTADO</th>
        <th>IMAGEN</th>
        <th>EDITAR</th>
        <th>BORRAR</th>
      </tr>
    </thead>

    <tbody>

          <?php
              require 'logica/conexion.php';
              $re=mysql_query("SELECT * FROM banner") or die (mysql_error());
              while ($row=mysql_fetch_array($re)){
          ?>

      <tr>
        <td> <?php echo $row['titulo'];?> </td>
        <td> <?php echo $row['descripcion'];?> </td>
        <td> <?php echo $row['estado'];?> </td>
        <td> <img src="img_banner/<?php echo $row['img_banner'];?>" alt="" width="70" height="50"> </td>
        <td> <a href="logica/editarbanner.php?editar=<?php echo $row['id_banner'];?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a> </td>
        <td> <a href="logica/eliminarbanner.php?eliminar=<?php echo $row['id_banner'];?>"class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a> </td>
      </tr>
      <?php
      	 }
      ?>
    </tbody>
  </table>


    </div>

    <div class="col-md-6">

<form action="logica/subirbanner.php" method="post" class="form-register" enctype="multipart/form-data">
      <div class="bannergen1">

          <div class="genetitu">

            <input type="text" name="titulo" placeholder="Titulo" class="form-control inputbanner">

            <textarea name="descripcion"  cols="18" rows="8" class="form-control inputbanner" placeholder="Descripcion"></textarea>

          </div>

          <div class="genetitu1">

                <div id="visor">
                		<output id="list"><h4>imagen banner</h4></output>
                </div>

                <div id="div_file">
                  <p id="texto">Subir Foto</p>
                	<input type="file" id="files" name="imagen" class="btn_enviar">
                </div>

                <div class="genebtn">

                  <button type="reset" class="btnborrar">Borrar Campos</button>

                  <button type="submit" class="btn-enviar">Publicar</button>

                </div>

          </div>
  </div>
</form>
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
    <script src="js/visor.js"></script>
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
