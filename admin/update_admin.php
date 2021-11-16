<?php
session_start();
include("conexion.php");

if(isset($_SESSION['usuario']))
  {
   $temp=$_SESSION['usuario'];
        if ($temp[0]==1) {
        }
        else
        {
           header("Location: ../index.php?Error=Acceso_denegado");     
        }   
  }
  else
  {
     header("Location: ../index.php?Error=Acceso_denegado");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cootransguamo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../estilo.css">
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">
	<script src="../js/jquery-1.11.3.min.js" type="text/javascript"></script>
  
</head>
<body>
<?php


  include("conexion.php");    
            
    if(isset($_POST['documento_usuario']) && !empty($_POST['documento_usuario']) && 
       isset($_POST['nombres_usuario']) && !empty($_POST['nombres_usuario']) &&
       isset($_POST['apellidos_usuario']) && !empty($_POST['apellidos_usuario']) && 
       isset($_POST['direccion_usuario']) && !empty($_POST['direccion_usuario']) && 
       isset($_POST['celular_usuario']) && !empty($_POST['celular_usuario']) &&
       isset($_POST['email']) && !empty($_POST['email']) &&
       isset($_POST['id_usuario']) && !empty($_POST['id_usuario']) &&
       isset($_POST['id_estado']) && !empty($_POST['id_estado']))
    {
        $documento_usuario = ($_POST['documento_usuario']);
        $nombres_usuario = ($_POST['nombres_usuario']);
        $apellidos_usuario = ($_POST['apellidos_usuario']);
        $direccion_usuario = ($_POST['direccion_usuario']);
        $celular_usuario = ($_POST['celular_usuario']);
        $email = ($_POST['email']);
        $id_usuario = ($_POST['id_usuario']);
        $id_estado = ($_POST['id_estado']);
        
               
                $sql="UPDATE Usuarios SET documento_usuario='$documento_usuario',
                                          nombres_usuario='$nombres_usuario',
                                          apellidos_usuario='$apellidos_usuario',
                                          direccion_usuario='$direccion_usuario',
                                          celular_usuario='$celular_usuario',
                                          email='$email',
                                          id_estado='$id_estado'

                      WHERE id_usuario='$id_usuario'";
                                      

                $insertar=mysql_query($sql) or die(mysql_error());

                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h2>Se han Actualizado los Datos Satisfactoriamente</h2>";
                echo "<meta http-equiv='Refresh' content='3;url=actualizar_admin.php'>";
                echo "</center>";
             
    }
    else
 {
    echo "<center>";
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />";
    echo "<h3>Faltan datos del formulario</h3>";
    echo "<meta http-equiv='Refresh' content='3;url=actualizar_admin.php'>"; 
    echo "</center>";
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />";

 }
      



?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>