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
            
    if(isset($_POST['documento_propietario']) && !empty($_POST['documento_propietario']) && 
       isset($_POST['nombres_propietario']) && !empty($_POST['nombres_propietario']) &&
       isset($_POST['apellidos_propietario']) && !empty($_POST['apellidos_propietario']) && 
       isset($_POST['direccion_propietario']) && !empty($_POST['direccion_propietario']) && 
       isset($_POST['celular_propietario']) && !empty($_POST['celular_propietario']) &&
       isset($_POST['email']) && !empty($_POST['email']) &&
       isset($_POST['id_propietario']) && !empty($_POST['id_propietario']) &&
       isset($_POST['id_estado']) && !empty($_POST['id_estado']))
    {
        $documento_propietario = ($_POST['documento_propietario']);
        $nombres_propietario = ($_POST['nombres_propietario']);
        $apellidos_propietario = ($_POST['apellidos_propietario']);
        $direccion_propietario = ($_POST['direccion_propietario']);
        $celular_propietario = ($_POST['celular_propietario']);
        $email = ($_POST['email']);
        $id_propietario = ($_POST['id_propietario']);
        $id_estado = ($_POST['id_estado']);
        
               
                $sql="UPDATE propietarios SET documento_propietario='$documento_propietario',
                                              nombres_propietario='$nombres_propietario',
                                              apellidos_propietario='$apellidos_propietario',
                                              direccion_propietario='$direccion_propietario',
                                              celular_propietario='$celular_propietario',
                                              email='$email',
                                              id_estado='$id_estado'

                      WHERE id_propietario='$id_propietario'";
                                      

                $insertar=mysql_query($sql) or die(mysql_error());

                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h2>El Propietario se ha Actualizado Satisfactoriamente</h2>";
                echo "<meta http-equiv='Refresh' content='3;url=actualizar_propietario.php'>";
                echo "</center>";
             
    }
    else
 {
    echo "<center>";
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />";
    echo "<h3>Faltan datos del formulario</h3>";
    echo "<meta http-equiv='Refresh' content='3;url=actualizar_propietario.php'>"; 
    echo "</center>";
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />";

 }
      



?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
