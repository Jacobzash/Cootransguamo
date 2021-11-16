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
        <h2>Busqueda de Conductor Por Vehículo Asignado</h2>
        <table style="width: 40%"  class="table table-condensed table-hover">
          <tr>
            <td colspan="2" align="center" style="background-color: #f0b650; color: #fff">
              <h3>Documento del Conductor</h3></td>
          </tr>
          <tr>
            <td style="width: 20%" align="center">
              <input class="form-control" type="number" name="documento_conductor" style="width:300px; height:27px" required placeholder="Documento" />
                
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

          if(isset($_POST['documento_conductor']) && !empty($_POST['documento_conductor']))
          {

            $documento_conductor = $_POST['documento_conductor'];
            

            $sql = "SELECT * FROM asignar,conductores,vehiculos,tipo_vehiculo,estado 
                    WHERE conductores.id_conductor=asignar.id_conductor 
                    AND conductores.id_estado=estado.id_estado
                    AND vehiculos.num_interno_vehiculo=asignar.num_interno_vehiculo
                    AND vehiculos.id_tipo_vehiculo=tipo_vehiculo.id_tipo_vehiculo
                    AND conductores.documento_conductor='$documento_conductor'";

            $registro = mysql_query($sql);

            $resultado = mysql_num_rows($registro); 
                        

              if($resultado > 0) 
              { 

  ?>
            
            <center>
            <br /><br />
              <h2>Vehículos Asignados al Conductor <?php echo $documento_conductor; ?></h2>
               <table class="table table-condensed table-bordered table-hover"  style="width:70%">
                <tr style="background: #f0b650">
                  <td align="center" style="width: 10%"><font color="#fff">Número Interno</font></td>
                  <td align="center" style="width: 10%"><font color="#fff">Placa</font></td>
                  <td align="center" style="width: 10%"><font color="#fff">Tipo Vehículo</font></td>
                  <td align="center" style="width: 10%"><font color="#fff">Modelo</font></td>
                  <td align="center" style="width: 10%"><font color="#fff">Marca</font></td>
                </tr>
  <?php

               while ($reg=mysql_fetch_array($registro)) 
                {
                 
  ?>

            
                <tr>
                  <td><?php echo $reg['num_interno_vehiculo']; ?></td>
                  <td><?php echo $reg['placa_vehiculo']; ?></td>
                  <td><?php echo $reg['tipo_vehiculo']; ?></td>
                  <td><?php echo $reg['modelo_vehiculo']; ?></td>
                  <td><?php echo $reg['marca_vehiculo']; ?></td>
                </tr>
                
                     
  <?php
  
              }

          }
           else
           {
             echo "<center><br /><br /><br /><br /><br /><br />";
             echo "<h2>No se encuentran Vehiculos Relacionados Con el Conductor </h2>";
             echo "<meta http-equiv='Refresh' content='3;url=conductor_vehiculo.php'>";
             echo "</center>";
           }

       }
      else
      {
        
        echo "<center><br /><br /><br /><br /><br /><br />";
        echo "<h2>No ha llenado la caja de texto</h2>";
        echo "<meta http-equiv='Refresh' content='3;url=conductor_vehiculo.php'>";
        echo "</center>";
      }
  }
    
  ?>
           </table> 
          </center>
             



</body>
</html>