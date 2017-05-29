
<?php
require("constants.php");

$con = mysql_connect(DB_SERVER,DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die("conectar a la base de datos");
	@mysql_set_charset("utf8", $con);

	?>
