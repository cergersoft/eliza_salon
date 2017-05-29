<?php
$conexion=mysqli_connect('sql104.byetcluster.com','eshos_18419746','geraldin','eshos_18419746_lizsalon') or die
 ('Error al conectar con la base de datos');
 	@mysql_set_charset("utf8", $conexion);

    $server="sql104.byetcluster.com";
  	$username="eshos_18419746";
  	$password="geraldin";
  	$db='eshos_18419746_lizsalon';
  	$con=mysql_connect($server,$username,$password)or die("no se ha podido establecer la conexion");
  	$sdb=mysql_select_db($db,$con)or die("la base de datos no existe");
    @mysql_set_charset("utf8", $con);


    $conexcitas=mysql_connect("sql104.byetcluster.com","eshos_18419746","geraldin");
    $baseDeDatos=mysql_select_db("eshos_18419746_lizsalon",$conexcitas);
    @mysql_set_charset("utf8", $conexcitas);

?>
