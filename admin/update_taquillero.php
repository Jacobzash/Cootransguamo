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
            
    if(isset($_POST['documento_taquillero']) && !empty($_POST['documento_taquillero']) && 
       isset($_POST['nombres_taquillero']) && !empty($_POST['nombres_taquillero']) &&
       isset($_POST['apellidos_taquillero']) && !empty($_POST['apellidos_taquillero']) && 
       isset($_POST['direccion_taquillero']) && !empty($_POST['direccion_taquillero']) && 
       isset($_POST['celular_taquillero']) && !empty($_POST['celular_taquillero']) &&
       isset($_POST['email']) && !empty($_POST['email']) &&
       isset($_POST['id_taquillero']) && !empty($_POST['id_taquillero']) &&
       isset($_POST['id_estado']) && !empty($_POST['id_estado']))
    {
        $documento_taquillero = ($_POST['documento_taquillero']);
        $nombres_taquillero = ($_POST['nombres_taquillero']);
        $apellidos_taquillero = ($_POST['apellidos_taquillero']);
        $direccion_taquillero = ($_POST['direccion_taquillero']);
        $celular_taquillero = ($_POST['celular_taquillero']);
        $email = ($_POST['email']);
        $id_taquillero = ($_POST['id_taquillero']);
        $id_estado = ($_POST['id_estado']);
 
               
                $sql="UPDATE taquilleros SET documento_taquillero='$documento_taquillero',
                                          nombres_taquillero='$nombres_taquillero',
                                          apellidos_taquillero='$apellidos_taquillero',
                                          direccion_taquillero='$direccion_taquillero',
                                          celular_taquillero='$celular_taquillero',
                                          email='$email',
                                          id_estado='$id_estado'

                      WHERE id_taquillero='$id_taquillero'";
                                      

                $insertar=mysql_query($sql) or die(mysql_error());

                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h2>El Taquillero se ha Actualizado Satisfactoriamente</h2>";
                echo "<meta http-equiv='Refresh' content='3;url=actualizar_taquillero.php'>";
                echo "</center>";
             
    }
    else
 {
    echo "<center>";
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />";
    echo "<h3>Faltan datos del formulario</h3>";
    echo "<meta http-equiv='Refresh' content='3;url=actualizar_taquillero.php'>"; 
    echo "</center>";
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />";

 }
      



?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
