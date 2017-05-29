
<?php
session_start();

include 'conexion.php';

$ruta = "../img_banner/";
opendir($ruta);
$destino = $ruta.$_FILES['imagen']['name'];
copy($_FILES['imagen']['tmp_name'],$destino);
$img_banner = $_FILES['imagen']['name'];

//redimencionar imagenes

$ruta_imagen = "../img_banner/$img_banner";
$miniatura_ancho_maximo = 1023;
$miniatura_alto_maximo = 419;
$calidad = 90;
$info_imagen = getimagesize($ruta_imagen);
$imagen_ancho = $info_imagen[0];
$imagen_alto = $info_imagen[1];
$imagen_tipo = $info_imagen['mime'];


$proporcion_imagen = $imagen_ancho / $imagen_alto;
$proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

if ( $proporcion_imagen = $proporcion_miniatura ){
	$miniatura_ancho = $miniatura_ancho_maximo;
	$miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;

} else if ( $proporcion_imagen = $proporcion_miniatura ){
	$miniatura_ancho = $miniatura_ancho_maximo * $proporcion_imagen;
	$miniatura_alto = $miniatura_alto_maximo;

} else {
	$miniatura_ancho = $miniatura_ancho_maximo;
	$miniatura_alto = $miniatura_alto_maximo;
}


switch ( $imagen_tipo ){
	case "image/png":
		$imagen = imagecreatefrompng( $ruta_imagen );
		break;

        case "image/jpg":
	case "image/jpeg":
		$imagen = imagecreatefromjpeg( $ruta_imagen );

		break;
	case "image/gif":
		$imagen = imagecreatefromgif( $ruta_imagen );
		break;
}

$lienzo = imagecreatetruecolor( $miniatura_ancho, $miniatura_alto );

imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho, $miniatura_alto, $imagen_ancho, $imagen_alto);

$resultado= imagejpeg($lienzo,$ruta_imagen,$calidad);

//variables post del formulario

$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$estado = "activo";

// insert  a la base de datos

$insert = "INSERT INTO `banner`(`titulo`, `descripcion`, `estado`, `img_banner`) VALUES ('$titulo', '$descripcion', '$estado', '$img_banner');";

//realizar consultas
$resultado = mysqli_query($conexion, $insert);
if (!$resultado) {
		echo '
			<script>
				alert("Error al registrar la imagen");
				self.location = "../adminbanner.php"
			</script>';
} else {

		echo '
			<script>
				alert("imagen registrada con exito");
				self.location = "../adminbanner.php"
			</script>';
}

//cerrar conexion

mysqli_close($conexion);


?>
