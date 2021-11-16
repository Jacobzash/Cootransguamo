<?php
session_start();
include("conexion.php");

if(isset($_SESSION['usuario']))
  {
   $temp=$_SESSION['usuario'];
        if ($temp[0]==3) {
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

      
      $id_propietario = $temp[0];

      $sql = "SELECT * FROM poseer,vehiculos,propietarios,tipo_vehiculo,estado 
                    WHERE poseer.id_propietario=propietarios.id_propietario 
                    AND poseer.num_interno_vehiculo=vehiculos.num_interno_vehiculo
                    AND vehiculos.id_tipo_vehiculo=tipo_vehiculo.id_tipo_vehiculo
                    AND vehiculos.id_estado=estado.id_estado
                    AND poseer.id_propietario= '$id_propietario'";
                $registro = mysql_query($sql);

                $resultado = mysql_num_rows($registro); 
                        

              if($resultado > 0) 
              { 
                 while ($reg=mysql_fetch_array($registro)) 
                {
  ?>

            <center>
            <br /><br />
              <h2>Vehiculos Relacionados</h2>
               <table class="table table-condensed table-bordered table-hover"  style="width:75%">
                <tr style="background: #f0b650">
                <td align="center" style="width: 5%"><font color="#fff">Número Interno</font></td>
                <td align="center" style="width: 15%"><font color="#fff">Placa</font></td>
                <td align="center" style="width: 15%"><font color="#fff">Tipo Vehiuclo</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Modelo</font></td>
                <td align="center" style="width: 15%"><font color="#fff">Cilindraje</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Número Motor</font></td>
                <td align="center" style="width: 5%"><font color="#fff">Marca</font></td>
                </tr>
                <tr>
                <td><?php echo $reg['num_interno_vehiculo']; ?></td>
                <td style="text-transform: uppercase"><?php echo $reg['placa_vehiculo']; ?></td>
                <td><?php echo $reg['tipo_vehiculo']; ?></td>
                <td><?php echo $reg['modelo_vehiculo']; ?></td>
                <td><?php echo $reg['cilindraje_vehiculo']. "&nbsp;cc"; ?></td>
                <td style="text-transform: uppercase"><?php echo $reg['num_motor_vehiculo']; ?></td>
                <td><?php echo $reg['marca_vehiculo']; ?></td>
              </tr>
              <tr style="background: #f0b650">
                <td align="center" style="width: 5%"><font color="#fff">Clase</font></td>
                <td align="center" style="width: 15%"><font color="#fff">Capacidad</font></td>
                <td align="center" style="width: 15%"><font color="#fff">Vin</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Soat</font></td>
                <td align="center" style="width: 15%"><font color="#fff">Vigencia Soat</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Tecnomecanica</font></td>
                <td align="center" style="width: 5%"><font color="#fff">Vigencia Tecnomecanica</font></td>
                </tr>
                <tr>
                <td><?php echo $reg['clase_vehiculo']; ?></td>
                <td><?php echo $reg['capacidad_vehiculo']."&nbsp;Pasajeros"; ?></td>
                <td><?php echo $reg['vin_vehiculo']; ?></td>
                <td><?php echo $reg['soat_vehiculo']; ?></td>
                <td><?php echo $reg['vigencia_soat']; ?></td>
                <td><?php echo $reg['tecno_vehiculo']; ?></td>
                <td><?php echo $reg['vigencia_tecno']; ?></td>
              </tr>
              <tr style="background: #f0b650">
                <td align="center" style="width: 5%" colspan="3"><font color="#fff">Licencia Transito</font></td>
                <td align="center" style="width: 15%" colspan="3"><font color="#fff">Vigencia Licencia</font></td>
                <td align="center" style="width: 15%"><font color="#fff">Estado</font></td>
                </tr>
                <tr>
                <td colspan="3"><?php echo $reg['licencia_transito_vehiculo']; ?></td>
                <td colspan="3"><?php echo $reg['vigencia_licencia']; ?></td>
                <td><?php echo $reg['estado']; ?></td>
                
              </tr>
              </table> 
          </center>
  <?php
  
            }

          }
           else
           {
             echo "<center><br /><br /><br /><br /><br /><br />";
             echo "<h2>No tiene Vehiculos Relacionados  </h2>";
             //echo "<meta http-equiv='Refresh' content='3;url=buscar_vehiculo.php'>";
             echo "</center>";
           }

       
    
  ?>
           
             



</body>
</html>