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

        
            $sql = "SELECT * FROM rutas,estado WHERE rutas.id_estado=estado.id_estado";
                $registro = mysql_query($sql);

                $resultado = mysql_num_rows($registro); 
                        

              if($resultado > 0) 
              { 
     
 ?>  
    <br />
    <center>
      <br /><br />
               <h2>Rutas</h2>
               <table class="table table-condensed table-hover"  style="width:70%">
                <tr style="background: #f0b650">
                <td align="center" style="width: 10%"><font color="#fff">Ruta</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Ciudad Origen</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Ciudad Destino</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Estado</font></td>
               </tr>
            
  <?php

          while ($reg=mysql_fetch_array($registro)) 
                {
  ?>
                
                <tr>
                <td><?php echo $reg['nombre_ruta']; ?></td>
                <td><?php echo $reg['ciudad_origen']; ?></td>
                <td><?php echo $reg['ciudad_destino']; ?></td>
                <td><?php echo $reg['estado']; ?></td>
                </tr>
              
  <?php
  
                }

           echo "</table>"; 
           echo "</center>";

           echo "<center>";
           echo "<button class='btn btn-success btn-sm' value='Imprimir' onclick='window.print()'><i class='fa fa-print'></i>&nbsp;Imprimir</button>";
           echo "</center>";

          }
           else
           {
             echo "<center><br /><br /><br /><br /><br /><br />";
             echo "<h2>No Existen Rutas </h2>";
             echo "</center>";
           }

       
    
  ?>
           
             



</body>
</html>
