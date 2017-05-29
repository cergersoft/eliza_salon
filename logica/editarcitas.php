<?php
 include "conexion.php";
 
 $con=mysql_connect($server,$username,$password)or die("problemas al conectar al servidor");
 mysql_select_db($db,$con)or die("no existe la base de datos");

mysql_query("UPDATE `tabla_citas` SET hora_cita ='".$_POST['hora_cita']."', dia_cita ='".$_POST['dia_cita']."',  estado ='".$_POST['estado']."'  WHERE id_cita =".$_POST['id'].";");
header("Location: ../administracion.php");
?>
