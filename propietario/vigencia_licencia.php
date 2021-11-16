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

<br /><br />

<div class="table-responsive">
    <table style="width: 50%" width="50%" align="center" class="table table-condensed table-hover">

<?php
  include("conexion.php");

        $temp=$_SESSION['usuario'];
        $id_propietario = $temp[0];


            $sql = "SELECT * FROM propietarios,estado,poseer,vehiculos 
                    WHERE propietarios.id_estado=estado.id_estado 
                    AND propietarios.id_propietario=poseer.id_propietario 
                    AND poseer.num_interno_vehiculo=vehiculos.num_interno_vehiculo
                    AND propietarios.id_estado=1   
                    AND propietarios.id_propietario='$id_propietario'
                    AND vehiculos.vigencia_soat BETWEEN curdate()
                    AND date_add(curdate(),interval 60 day)";

            
              $registro = mysql_query($sql)or die(mysql_error());

              $resultado = mysql_num_rows($registro); 
                        
              if($resultado > 0 ) 
              { 
  ?>
              <tr style="background: #f0b650">
                <td align="center"><font color="#fff">No Interno</font></td>
                <td align="center"><font color="#fff">Placa</font></td>
                <td align="center"><font color="#fff">Soat</font></td>
                <td align="center"><font color="#fff">Tecnomecánica</font></td>
                <td align="center"><font color="#fff">Licencia Transito</font></td>
              </tr>


  <?php

                while ($reg=mysql_fetch_array($registro)) 
                {
                  date_default_timezone_set("America/Bogota");
                  //$mes = date('Y-m-d', strtotime('+2 month')) ; // suma 2 meses
                  //$licencia = $reg['vigencia_soat'];
                  //if ($licencia == $mes) 
                  //{
                    
    ?>
                  <tr>
                    <td align="center"><?php echo $reg['num_interno_vehiculo']; ?></td>
                    <td align="center"><?php echo $reg['placa_vehiculo']; ?></td>
                    <td align="center"><?php echo $reg['vigencia_soat']; ?></td>
                    <td align="center"><?php echo $reg['vigencia_tecno']; ?></td>
                    <td align="center"><?php echo $reg['vigencia_licencia']; ?></td>
                  </tr>
    <?php
  
                  //}
                }
              }
           

  ?>
        </table>
      </div>
         

</body>
</html>