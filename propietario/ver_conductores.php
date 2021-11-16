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

      $sql = "SELECT * FROM contratar,vehiculos,propietarios,asignar,conductores,estado 
                    WHERE contratar.id_propietario=propietarios.id_propietario 
                    AND contratar.id_conductor=conductores.id_conductor
                    AND asignar.num_interno_vehiculo=vehiculos.num_interno_vehiculo
                    AND conductores.id_estado=estado.id_estado
                    AND contratar.id_propietario= '$id_propietario'";
                $registro = mysql_query($sql);

                $resultado = mysql_num_rows($registro); 
                        

              if($resultado > 0) 
              { 
                
  ?>

            <center>
            <br /><br />
              <h2>Conductores Relacionados Por Vehiculos</h2>
               <table class="table table-condensed table-bordered table-hover"  style="width:80%">
                <tr style="background: #f0b650">
                  <td align="center" style="width: 7%"><font color="#fff">Documento</font></td>
                  <td align="center" style="width: 12%"><font color="#fff">Nombres</font></td>
                  <td align="center" style="width: 12%"><font color="#fff">Apellidos</font></td>
                  <td align="center" style="width: 12%"><font color="#fff">Dirección</font></td>
                  <td align="center" style="width: 7%"><font color="#fff">Celular</font></td>
                  <td align="center" style="width: 10%"><font color="#fff">E-Mail</font></td>
                  <td align="center" style="width: 7%"><font color="#fff">Licencia</font></td>
                  <td align="center" style="width: 7%"><font color="#fff">Estado</font></td>
                  <td align="center" style="width: 10%"><font color="#fff">Placa Vehiculo</font></td>
                </tr>

          <?php

               while ($reg=mysql_fetch_array($registro)) 
                {
          ?>
                <tr>
                  <td><?php echo $reg['documento_conductor']; ?></td>
                  <td><?php echo $reg['nombres_conductor']; ?></td>
                  <td><?php echo $reg['apellidos_conductor']; ?></td>
                  <td><?php echo $reg['direccion_conductor']; ?></td>
                  <td><?php echo $reg['celular_conductor']; ?></td>
                  <td><?php echo $reg['email']; ?></td>
                  <td style="text-transform: uppercase"><?php echo $reg['licencia_conductor']; ?></td>
                  <td><?php echo $reg['estado']; ?></td>
                  <td style="text-transform: uppercase"><?php echo $reg['placa_vehiculo']; ?></td>
               </tr>
          <?php
                }
          ?>  
              
              </table> 
          </center>
  <?php
  
            

          }
           else
           {
             echo "<center><br /><br /><br /><br /><br /><br />";
             echo "<h2>No Tiene Conductores Relacionados  </h2>";
             echo "</center>";
           }

       
    
  ?>
           
             



</body>
</html>