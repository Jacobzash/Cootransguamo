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
            
    if(isset($_POST['id_rutas']) && !empty($_POST['id_rutas']) && 
       isset($_POST['nombre_ruta']) && !empty($_POST['nombre_ruta']) &&
       isset($_POST['municipio']) && !empty($_POST['municipio']) && 
       isset($_POST['municipio2']) && !empty($_POST['municipio2']) && 
       isset($_POST['id_estado']) && !empty($_POST['id_estado']))
    {
        $id_rutas = ($_POST['id_rutas']);
        $nombre_ruta = ($_POST['nombre_ruta']);
        $municipio = ($_POST['municipio']);
        $municipio2 = ($_POST['municipio2']);
        $id_estado = ($_POST['id_estado']);
        
        
               
                $sql="UPDATE rutas SET nombre_ruta='$nombre_ruta',
                                              ciudad_origen='$municipio',
                                              ciudad_destino='$municipio2',
                                              id_estado='$id_estado'

                      WHERE id_rutas='$id_rutas'";
                                      

                $insertar=mysql_query($sql) or die(mysql_error());

                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h2>La Ruta se ha Actualizado Satisfactoriamente</h2>";
                echo "<meta http-equiv='Refresh' content='3;url=actualizar_ruta.php'>";
                echo "</center>";
             
    }
    else
 {
    echo "<center>";
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />";
    echo "<h3>Faltan datos del formulario</h3>";
    echo "<meta http-equiv='Refresh' content='3;url=actualizar_ruta.php'>"; 
    echo "</center>";
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />";

 }
      



?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
