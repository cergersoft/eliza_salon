<?php

require 'conexion.php';

$nombre = utf8_decode($_POST['nom']);
$apellido = utf8_decode($_POST['ape']);
$usuario = utf8_decode($_POST['usu']);
$password = utf8_decode($_POST['pas']);
$cell = utf8_decode($_POST['cel']);
$mail = utf8_decode($_POST['cor']);

@$ip=getenv('REMOTE_ADDR');
// inicio consulta para insertar

$insertar = "INSERT INTO `tabla_usuarios`(`nombre`, `apellido`, `celular`, `e_mail`, `usuario`, `password`, `ip`) VALUES ('$nombre', '$apellido', '$cell', '$mail', '$usuario', '$password', '$ip');";


$verificar_usuario = mysqli_query($conexion, "SELECT * FROM `tabla_usuarios` WHERE usuario = '$usuario'");
if (mysqli_num_rows($verificar_usuario) > 0){
		echo '
			<script>
				alert("Atencion, ya existe este usuario, verifique sus datos");
				self.location = "../"
			</script>';
		exit;
}

$verificar_correo = mysqli_query($conexion, "SELECT * FROM `tabla_usuarios` WHERE e_mail = '$mail'");
if (mysqli_num_rows($verificar_correo) > 0){
		echo '
			<script>
				alert("Atencion, ya existe esta cuenta de correo, verifique sus datos");
				self.location = "../"
			</script>';
		exit;
}



// ejecutar consulta insertar

$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
		echo '
			<script>
				alert("Error al registrarse");
				self.location = " .."
			</script>';
} else {
	echo '
			<script>
				alert("Usuario registrado con exito");
				self.location = " ../"
			</script>';
}

//cerrar conexion

mysqli_close($conexion);

?>
