<?php
session_start();

require_once("connection.php");

if(isset($_POST["login"])){

if(!empty($_POST['user']) && !empty($_POST['password'])) {
    $username=$_POST['user'];
    $password=$_POST['password'];

    $user="usuario";
    $admin="admin";

$query =mysql_query("SELECT * FROM `tabla_usuarios` WHERE usuario='".$username."' AND password='".$password."'");


    $numrows=mysql_num_rows($query);
    if($numrows!=0)

    {

    while($row=mysql_fetch_assoc($query))

    {

      $dbusername=$row['usuario'];
      $dbpassword=$row['password'];
      $dbname=$row['nombre'];
      $dblastname=$row['apellido'];
      $dbrole=$row['rol'];
      $dimg=$row['img_perfil'];

    }

    if($username == $dbusername && $password == $dbpassword && $user == $dbrole)

    {

      $_SESSION['session_username']= $dbusername;
      $_SESSION['session_img']= $dimg;
      $_SESSION['nombre']= $dbname." ".$dblastname;


    echo '
        <script language = javascript>

        alert("Has iniciado sesion")
                self.location = "../home.php"

        </script>';


  } if ($username == $dbusername && $password == $dbpassword && $admin == $dbrole){

    $_SESSION['session_username']=$dbname. " " .$dblastname;
    $_SESSION['session_img']= $dimg;
    $_SESSION['nombre']= $dbname." ".$dblastname;
      echo '
          <script language = javascript>
                  alert("Has iniciado sesion")
                  self.location = "../administracion.php"
          </script>';
      }

} else{
        echo '
			<script>
				alert("Correo o password Invalidos");
        self.location = "../index.php"
			</script>';
  }

}
}
?>
