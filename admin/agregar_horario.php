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
            
    if(isset($_POST['horario']) && !empty($_POST['horario']) &&
       isset($_POST['id_rutas']) && !empty($_POST['id_rutas']) &&
       isset($_POST['nombre_ruta']) && !empty($_POST['nombre_ruta']))
    {
       
        $horario = ($_POST['horario']);
        $id_rutas = ($_POST['id_rutas']);
        $nombre_ruta = ($_POST['nombre_ruta']);
        $id_estado = 1;

     foreach ($horario as $value) 
      {  

        $seleccion="SELECT * FROM detalle_rutas WHERE horario='$value' AND id_rutas='$id_rutas'";
        $resul=mysql_query($seleccion)or die(mysql_error());
        $R=mysql_fetch_array($resul);
        
          

             if($value==$R['horario'] && $id_rutas==$R['id_rutas']) 
             {  
                
                $tit[]=$value;
            
             }
             else
             {

                  $sql3="INSERT INTO detalle_rutas (id_rutas,horario,id_estado) 
                         VALUES ('$id_rutas','$value','$id_estado')";
                  $consulta=mysql_query($sql3) or die(mysql_error());
                  
                $tit2[]=$value;
              
             }
       }
 
    @$titulo1 = count($tit);
    @$titulo2 = count($tit2);

    
    if (($titulo1 > 0) && ($titulo2 > 0))    
    {
            $cadena_tit = implode(" | ", $tit);
            echo "<center><br /><br /><br /><br /><br /><br />";
            echo "<h3>El horario de ".$cadena_tit." Ya Está Registrado </h3>";
            
            
            echo "<br />";
            $cadena_tit2 = implode(" | ", $tit2);
            echo "<h3>El horario de ".$cadena_tit2." Se Ha Registrado Satisfactoriamente </h3>";
            echo "<form action='datos_ruta.php' method='post'>";
            echo "<input type='hidden' name='nombre_ruta' value='$nombre_ruta' />";
            echo "<button type='submit' name='datos' class='btn btn-success btn-xs'>Volver</button>";
            echo "</form>";
            echo "</center>";
    }

    elseif ($titulo1 > 0) 
    {
      $cadena_tit = implode(" | ", $tit);
      echo "<center><br /><br /><br /><br /><br /><br />";
      echo "<h3>El horario de ".$cadena_tit." Ya está Registrado </h3>";
      echo "<form action='datos_ruta.php' method='post'>";
      echo "<input type='hidden' name='nombre_ruta' value='$nombre_ruta' />";
      echo "<button type='submit' name='datos' class='btn btn-success btn-xs'>Volver</button>";
      echo "</form>";
      echo "</center>";
    }
    
    elseif ($titulo2 > 0) 
    {
      $cadena_tit2 = implode(" | ", $tit2);
      echo "<center><br /><br /><br /><br /><br /><br />";
      echo "<h3>El horario de ".$cadena_tit2." Se Ha Registrado Satisfactoriamente </h3>";
      echo "<form action='datos_ruta.php' method='post'>";
      echo "<input type='hidden' name='nombre_ruta' value='$nombre_ruta' />";
      echo "<button type='submit' name='datos' class='btn btn-success btn-xs'>Volver</button>";
      echo "</form>";
      echo "</center>";
    }

    
       

        


    }
    else
    {
      
       echo "<center><br /><br /><br /><br /><br /><br />";
       echo "<h2>Faltan datos del formulario</h2>";
           //echo "<meta http-equiv='Refresh' content='3;url=nueva_ruta.php'>";
       echo "</center>";
    }



?>

</body>
</html>