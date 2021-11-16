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
            
    if(isset($_POST['num_interno_vehiculo']) && !empty($_POST['num_interno_vehiculo']) && 
       isset($_POST['clase_vehiculo']) && !empty($_POST['clase_vehiculo']) &&
       isset($_POST['capacidad_vehiculo']) && !empty($_POST['capacidad_vehiculo']) &&
       isset($_POST['soat_vehiculo']) && !empty($_POST['soat_vehiculo']) && 
       isset($_POST['vigencia_soat']) && !empty($_POST['vigencia_soat']) && 
       isset($_POST['tecno_vehiculo']) && !empty($_POST['tecno_vehiculo']) &&
       isset($_POST['vigencia_tecno']) && !empty($_POST['vigencia_tecno']) &&
       isset($_POST['licencia_transito_vehiculo']) && !empty($_POST['licencia_transito_vehiculo']) &&
       isset($_POST['vigencia_licencia']) && !empty($_POST['vigencia_licencia']) &&
       isset($_POST['id_estado']) && !empty($_POST['id_estado']))
    {
        
        $num_interno_vehiculo = ($_POST['num_interno_vehiculo']);
        $clase_vehiculo = ($_POST['clase_vehiculo']);
        $capacidad_vehiculo = ($_POST['capacidad_vehiculo']);
        $soat_vehiculo = ($_POST['soat_vehiculo']);
        $vigencia_soat = ($_POST['vigencia_soat']);
        $tecno_vehiculo = ($_POST['tecno_vehiculo']);
        $vigencia_tecno = ($_POST['vigencia_tecno']);
        $licencia_transito_vehiculo = ($_POST['licencia_transito_vehiculo']);
        $vigencia_licencia = ($_POST['vigencia_licencia']);
        $id_estado = ($_POST['id_estado']);
        
        
               
                $sql="UPDATE vehiculos SET  clase_vehiculo='$clase_vehiculo',
                                            capacidad_vehiculo='$capacidad_vehiculo',
                                            soat_vehiculo='$soat_vehiculo',
                                            vigencia_soat='$vigencia_soat',
                                            tecno_vehiculo='$tecno_vehiculo',
                                            vigencia_tecno='$vigencia_tecno',
                                            licencia_transito_vehiculo='$licencia_transito_vehiculo',
                                            vigencia_licencia='$vigencia_licencia',
                                            id_estado='$id_estado'

                      WHERE num_interno_vehiculo='$num_interno_vehiculo'";
                                      

                $insertar=mysql_query($sql) or die(mysql_error());

                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h2>Los Datos del Vehiculo se ha Actualizado Satisfactoriamente</h2>";
                echo "<meta http-equiv='Refresh' content='3;url=actualizar_vehiculo.php'>";
                echo "</center>";
             
    }
    else
 {
    echo "<center>";
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />";
    echo "<h3>Faltan datos del formulario</h3>";
    echo "<meta http-equiv='Refresh' content='3;url=actualizar_vehiculo.php'>"; 
    echo "</center>";
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />";

 }
      



?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
