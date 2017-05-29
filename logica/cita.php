<?php

require 'conexion.php';

$dia = utf8_decode($_POST['dia']);
$hora = utf8_decode($_POST['hora']);
$servicio = utf8_decode($_POST['servicio']);
$hidden = utf8_decode($_POST['name']);

@$ip=getenv('REMOTE_ADDR');
// inicio consulta para insertar

$insertar = "INSERT INTO `tabla_citas`(`dia_cita`, `hora_cita`, `servicios`, `cliente`, `ip`) VALUES
 ('$dia', '$hora', '$servicio', '$hidden', '$ip');";


$verificar_cita = mysqli_query($conexion, "SELECT * FROM `tabla_citas` WHERE hora_cita = '$hora' AND dia_cita = '$dia' ");
if (mysqli_num_rows($verificar_cita) > 0){
		echo '
			<script>
				alert("Atencion, ya existe cliente para esta hora");
				self.location = "../home.php"
			</script>';
		exit;
}

// ejecutar consulta insertar

$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
		echo '
			<script>
				alert("Error al Registrar Cita");
				self.location = " ../home.php"
			</script>';
} else {
	echo '
			<script>
				alert("Cita Registrada con Exito");
				self.location = " ../home.php"
			</script>';
}

//cerrar conexion

mysqli_close($conexion);

?>
