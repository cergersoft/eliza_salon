<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LizSalon</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sesion.css" rel="stylesheet">


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
        <li><a href="iniciarsesion.php" >Iniciar Sesion</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Registrarse en LizSalon </h1>
            <div class="account-wall">
                <img class="profile-img" src="registrar.png" alt="">
                <form action="logica/regisuser.php" method="post" class="form-signin">
                
                <input type="text" name="nom" class="form-control" placeholder="Nombre" required autofocus>
                <input type="text" name="ape" class="form-control" placeholder="Apellido" required>
                <input type="mail" name="cor" class="form-control" placeholder="Correo" required autofocus>
                <input type="text" name="cel" class="form-control" placeholder="celular" required>
                <input type="text" name="usu" class="form-control" placeholder="Usuario" required autofocus>
                <input type="password" name="pas" class="form-control" placeholder="password" required>
                
                <button class="btn btn-lg btn-primary btn-block" type="submit"> Registrarse</button>
                
                </form>
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
