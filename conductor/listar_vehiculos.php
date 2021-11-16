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

            $sql = "SELECT * FROM vehiculos,tipo_vehiculo,estado,asignar 
                    WHERE vehiculos.id_tipo_vehiculo=tipo_vehiculo.id_tipo_vehiculo 
                    AND vehiculos.id_estado=estado.id_estado
                    AND vehiculos.num_interno_vehiculo=asignar.num_interno_vehiculo
                    AND asignar.id_conductor='$id_conductor'";
                $registro = mysql_query($sql);

                $resultado = mysql_num_rows($registro); 
                        

              if($resultado > 0) 
              { 
     
 ?>  
    <br />
    <center>
      <br /><br />
               <h2>Vehículos</h2>
               <table class="table table-condensed table-hover"  style="width:95%">
                <tr style="background: #f0b650">
                <td align="center"><font color="#fff">Número Interno</font></td>
                <td align="center"><font color="#fff">Placa</font></td>
                <td align="center"><font color="#fff">Modelo</font></td>
                <td align="center"><font color="#fff">Marca</font></td>
                <td align="center"><font color="#fff">Soat</font></td>
                <td align="center"><font color="#fff">Vigencia Soat</font></td>
                <td align="center"><font color="#fff">Tecnomecánica</font></td>
                <td align="center"><font color="#fff">Vigencia Tecnomecánica</font></td>
                <td align="center"><font color="#fff">Licencia</font></td>
                <td align="center"><font color="#fff">Vigencia Licencia</font></td>
                <td align="center"><font color="#fff">Tipo de Vehículo</font></td>
                <td align="center"><font color="#fff">Estado</font></td>
               </tr>
            
  <?php

          while ($reg=mysql_fetch_array($registro)) 
                {
  ?>
                
                <tr>
                <td><?php echo $reg['num_interno_vehiculo']; ?></td>
                <td><?php echo $reg['placa_vehiculo']; ?></td>
                <td><?php echo $reg['modelo_vehiculo']; ?></td>
                <td><?php echo $reg['marca_vehiculo']; ?></td>
                <td><?php echo $reg['soat_vehiculo']; ?></td>
                <td><?php echo $reg['vigencia_soat']; ?></td>
                <td><?php echo $reg['tecno_vehiculo']; ?></td>
                <td><?php echo $reg['vigencia_tecno']; ?></td>
                <td><?php echo $reg['licencia_transito_vehiculo']; ?></td>
                <td><?php echo $reg['vigencia_licencia']; ?></td>
                <td><?php echo $reg['tipo_vehiculo']; ?></td>
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
             echo "<h2>No Tiene Asignados Vehículos </h2>";
             echo "</center>";
           }

       
    
  ?>
           
             



</body>
</html>