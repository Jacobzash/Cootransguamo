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
  <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
<?php

  include("conexion.php");    
            
    
        $checkbox = $_POST['casilla'];
        $nombre_ruta = $_POST['nombre_ruta'];
          
            foreach ($checkbox as $value) 
            {

              $eliminar=mysql_query("DELETE FROM detalle_rutas WHERE id_detalle_rutas=".$value."");
              
                
            }

                echo "<center>";
                echo "<br /><br /><br /><br /><br />";
                echo "<h3>El Horario Se Ha Eliminado </h3>";
                echo "<form action='datos_ruta.php' method='post'>";
                echo "<input type='hidden' name='nombre_ruta' value='$nombre_ruta' />";
                echo "<button type='submit' name='datos' class='btn btn-success btn-xs'>Volver</button>";
                echo "</form>"; 
                echo "</center>";


?>

</body>
</html>