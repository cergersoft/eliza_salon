<?php
	include 'conexion.php';
	$id= $_GET['eliminar'];
	$con=mysql_connect($server,$username,$password)or die("problemas al conectar al servidor");
	mysql_select_db($db,$con)or die("no existe la base de datos");

	mysql_query("DELETE FROM tabla_citas WHERE id_cita =".$id.";");
	header("Location: ../administracion.php");
?>
