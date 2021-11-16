<?php
session_start();
include("conexion.php");

if(isset($_SESSION['usuario']))
  {
   $temp=$_SESSION['usuario'];
        if ($temp[0]==2) {
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

        $id_conductor = $temp[0];

            $sql = "SELECT * FROM conductores,estado WHERE conductores.id_estado=estado.id_estado 
                    AND conductores.id_estado=1 AND conductores.id_conductor='$id_conductor'";
              $registro = mysql_query($sql)or die(mysql_error());

              $resultado = mysql_num_rows($registro); 
                        
              if($resultado > 0 ) 
              { 

                while ($reg=mysql_fetch_array($registro)) 
                {
                  date_default_timezone_set("America/Bogota");
                  $mes = date('Y-m-d', strtotime('+2 month')) ; // suma 2 meses
                  $licencia = $reg['vigencia_licencia'];
                  if ($licencia == $mes) 
                  {
                    
                    echo "<center>";
                    echo "<br /><br /><br /><br /><br /><br /><br />";
                    echo "<h1>Su Licencia de Conducción está Proxima a Vencerse</h1>";
                    echo "<br />";
                    echo "<h2>Licencia Número : &nbsp;".$reg['licencia_conductor']."</h2>";
                    echo "<br />"; 
                    echo "<h2>Fecha de Vencimiento : &nbsp;".$reg['vigencia_licencia']."</h2>";
                    echo "</center>";
  
                  }
                }
              }
           

  ?>
         

</body>
</html>