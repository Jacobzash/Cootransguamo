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
  if (!isset($_POST['datos'])) 
  {  
     
 ?>  
    <br />
    <center>
      <form action="" method="post">
        <h2>Busqueda de Vehículo Para Conductor Asignado</h2>
        <table style="width: 40%"  class="table table-condensed table-hover">
          <tr>
            <td colspan="2" align="center" style="background-color: #f0b650; color: #fff">
              <h3>Placa del Vehículo</h3></td>
          </tr>
          <tr>
            <td style="width: 20%" align="center">
              <input class="form-control" type="text" name="placa_vehiculo" style="width:300px; height:27px; text-transform:uppercase" maxlength="6" required placeholder="Placa del Vehículo" />
                
            </td>
            
          </tr>
          <tr>
            <td colspan="2" align="center"><button type="submit" name="datos" class="btn btn-success btn-sm">Buscar</button></td>
          </tr>
        </table>
      </form>
    </center> 
           
    <br /><br />
            
  
    
<?php
}
else
{
          include("conexion.php");

          if(isset($_POST['placa_vehiculo']) && !empty($_POST['placa_vehiculo']))
          {

            $placa_vehiculo = $_POST['placa_vehiculo'];
            

            $sql = "SELECT * FROM vehiculos,estado 
                    WHERE vehiculos.id_estado=estado.id_estado
                    AND vehiculos.placa_vehiculo='$placa_vehiculo'";
            $registro = mysql_query($sql);
            $reg = mysql_fetch_array($registro);

            $num_interno=$reg['num_interno_vehiculo'];


            $sql2 = "SELECT * FROM asignar,conductores,vehiculos 
                    WHERE asignar.num_interno_vehiculo=vehiculos.num_interno_vehiculo 
                    AND asignar.id_conductor=conductores.id_conductor
                    AND vehiculos.num_interno_vehiculo='$num_interno'";

            $registro2 = mysql_query($sql2);

            $resultado = mysql_num_rows($registro2); 
                        

              if($resultado > 0) 
              { 

  ?>
            
            <center>
            <br /><br />
              <h2>Conductores del Vehiculo <?php echo $reg['placa_vehiculo']; ?></h2>
               <table class="table table-condensed table-bordered table-hover"  style="width:70%">
                <tr style="background: #f0b650">
                  <td align="center" style="width: 10%"><font color="#fff">Documento</font></td>
                  <td align="center" style="width: 10%"><font color="#fff">Nombres</font></td>
                  <td align="center" style="width: 10%"><font color="#fff">Apellidos</font></td>
                  <td align="center" style="width: 10%"><font color="#fff">Dirección</font></td>
                  <td align="center" style="width: 10%"><font color="#fff">Telefono</font></td>
                </tr>
  <?php

               while ($reg2=mysql_fetch_array($registro2)) 
                {
                 
  ?>

            
                <tr>
                  <td><?php echo $reg2['documento_conductor']; ?></td>
                  <td><?php echo $reg2['nombres_conductor']; ?></td>
                  <td><?php echo $reg2['apellidos_conductor']; ?></td>
                  <td><?php echo $reg2['direccion_conductor']; ?></td>
                  <td><?php echo $reg2['celular_conductor']; ?></td>
                </tr>
                
                     
  <?php
  
              }

          }
           else
           {
             echo "<center><br /><br /><br /><br /><br /><br />";
             echo "<h2>No se encuentran Conductores Relacionados con el Vehículo </h2>";
             echo "<meta http-equiv='Refresh' content='3;url=vehiculo_conductor.php'>";
             echo "</center>";
           }

       }
      else
      {
        
        echo "<center><br /><br /><br /><br /><br /><br />";
        echo "<h2>No ha llenado la caja de texto</h2>";
        echo "<meta http-equiv='Refresh' content='3;url=vehiculo_conductor.php'>";
        echo "</center>";
      }
  }
    
  ?>
           </table> 
          </center>
             



</body>
</html>