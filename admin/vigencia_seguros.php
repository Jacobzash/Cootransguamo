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
  <center>
      <h2>Licencias y Seguros Proximos a Vencerse</h2>
  </center>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-3">
    <center>
     <h2>Licencias</h2>
      <div class="table-responsive">
       <table border="0" width="100%" align="center" class="table table-condensed table-hover">
        
            <?php
              include("conexion.php");

                    
              //$sql = "SELECT * FROM conductores";
              $sql="SELECT * FROM conductores WHERE vigencia_licencia BETWEEN curdate() AND date_add(curdate(), interval 60 day)";
              $registro = mysql_query($sql);

              $resultado = mysql_num_rows($registro); 
                                    
              if($resultado > 0) 
              { 
                 
             ?>  
   
              
              <tr style="background: #f0b650">
                <td align="center"><font color="#fff">Documento</font></td>
                <td align="center"><font color="#fff">Nombres</font></td>
                <td align="center"><font color="#fff">Apellidos</font></td>
                <td align="center"><font color="#fff">Licencia</font></td>
              </tr>
            
              <?php
                      date_default_timezone_set("America/Bogota");
                      $fecha_hoy = date("Y-m-d");

                      while ($reg=mysql_fetch_array($registro)) 
                            {
                              
                              //$mes = date('Y-m-d', strtotime('+2 month')) ; // suma 2 meses
                              //if ($reg['vigencia_licencia'] == $mes) 
                              //{
                                
                      
              ?>
                              <tr>
                                <td align="center"><?php echo $reg['documento_conductor']; ?></td>
                                <td align="center"><?php echo $reg['nombres_conductor']; ?></td>
                                <td align="center"><?php echo $reg['apellidos_conductor']; ?></td>
                                <td align="center"><?php echo $reg['vigencia_licencia']; ?></td>
                              </tr>
              
              <?php
                              //}
                            }
              ?>

      </table>
    </div>
  
          <?php  

              }
               else
               {
                 echo "<center><br /><br /><br /><br /><br /><br />";
                 echo "<h2>No Existen Conductores </h2>";
                 echo "</center>";
               }

          ?>
    </center>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
    <center>
       <h2>Soat</h2>
      <div class="table-responsive">
        <table border="0" width="100%" align="center" class="table table-condensed table-hover">
   
       <?php
          include("conexion.php");

        
            //$sql = "SELECT * FROM vehiculos";
            $sql="SELECT * FROM vehiculos WHERE vigencia_soat BETWEEN curdate() AND date_add(curdate(), interval 60 day)";
              $registro = mysql_query($sql);

              $resultado = mysql_num_rows($registro);           

              if($resultado > 0) 
              { 
     
       ?>  
              <tr style="background: #f0b650">
                <td align="center"><font color="#fff">No Interno</font></td>
                <td align="center"><font color="#fff">Placa</font></td>
                <td align="center"><font color="#fff">Soat</font></td>
              </tr>
            
            <?php
                date_default_timezone_set("America/Bogota");
                $fecha_hoy = date("Y-m-d");

                while ($reg=mysql_fetch_array($registro)) 
                {
                            
                  //$mes = date('Y-m-d', strtotime('+2 month')) ; // suma 2 meses
                  //if ($reg['vigencia_soat'] == $mes) 
                  //{
                              
                    
            ?>
                    <tr>
                    <td align="center"><?php echo $reg['num_interno_vehiculo']; ?></td>
                    <td align="center"><?php echo $reg['placa_vehiculo']; ?></td>
                    <td align="center"><?php echo $reg['vigencia_soat']; ?></td>
                    </tr>
              
           <?php
                  //}
                }
           ?>

       </table>
      </div>
           
        <?php

          }
           else
           {
             echo "<center><br /><br /><br /><br /><br /><br />";
             echo "<h2>No Existen Vehículos </h2>";
             echo "</center>";
           }

        ?>
    </center>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
    <center>
      <h2>Tecnomécanica</h2>
      <div class="table-responsive">
       <table border="0" width="100%" align="center" class="table table-condensed table-hover">

      <?php
        include("conexion.php");

        
            //$sql = "SELECT * FROM vehiculos";
            $sql="SELECT * FROM vehiculos WHERE vigencia_tecno BETWEEN curdate() AND date_add(curdate(), interval 60 day)";
              $registro = mysql_query($sql);

              $resultado = mysql_num_rows($registro);           

              if($resultado > 0) 
              { 
     
      ?>  
               <tr style="background: #f0b650">
                <td align="center"><font color="#fff">No Interno</font></td>
                <td align="center"><font color="#fff">Placa</font></td>
                <td align="center"><font color="#fff">Tecnomécanica</font></td>
               </tr>
            
         <?php
          date_default_timezone_set("America/Bogota");
          $fecha_hoy = date("Y-m-d");

          while ($reg=mysql_fetch_array($registro)) 
                {
                  
                  //$mes = date('Y-m-d', strtotime('+2 month')) ; // suma 2 meses
                  //if ($reg['vigencia_tecno'] == $mes) 
                  //{
                    
          
        ?>
                  <tr>
                    <td align="center"><?php echo $reg['num_interno_vehiculo']; ?></td>
                    <td align="center"><?php echo $reg['placa_vehiculo']; ?></td>
                    <td align="center"><?php echo $reg['vigencia_tecno']; ?></td>
                  </tr>
              
        <?php
                  //}
                }
        ?>

      </table> 
    </div>
           
        <?php

          }
           else
           {
             echo "<center><br /><br /><br /><br /><br /><br />";
             echo "<h2>No Existen Vehículos </h2>";
             echo "</center>";
           }

        ?>
    </center>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
    <center>
      <h2>Transito</h2>
      <div class="table-responsive">
       <table border="0" width="100%" align="center" class="table table-condensed table-hover">

      <?php
          include("conexion.php");

        
            //$sql = "SELECT * FROM vehiculos";
            $sql="SELECT * FROM vehiculos WHERE vigencia_licencia BETWEEN curdate() AND date_add(curdate(), interval 60 day)";
              $registro = mysql_query($sql);

              $resultado = mysql_num_rows($registro);           

              if($resultado > 0) 
              { 
     
      ?>  
               <tr style="background: #f0b650">
                <td align="center"><font color="#fff">No Interno</font></td>
                <td align="center"><font color="#fff">Placa</font></td>
                <td align="center"><font color="#fff">Transito</font></td>
               </tr>
            
       <?php
          date_default_timezone_set("America/Bogota");
          $fecha_hoy = date("Y-m-d");

          while ($reg=mysql_fetch_array($registro)) 
                {
                  
                  //$mes = date('Y-m-d', strtotime('+2 month')) ; // suma 2 meses
                  //if ($reg['vigencia_licencia'] == $mes) 
                  //{
                    
          
       ?>
                   <tr>
                    <td align="center"><?php echo $reg['num_interno_vehiculo']; ?></td>
                    <td align="center"><?php echo $reg['placa_vehiculo']; ?></td>
                    <td align="center"><?php echo $reg['vigencia_licencia']; ?></td>
                   </tr>
              
       <?php
                  //}
                }
       ?>

      </table>
    </div>
           
       <?php

          }
           else
           {
             echo "<center><br /><br /><br /><br /><br /><br />";
             echo "<h2>No Existen Vehículos </h2>";
             echo "</center>";
           }

       ?>
         

    </center> 
  </div>         
</div>

</body>
</html>