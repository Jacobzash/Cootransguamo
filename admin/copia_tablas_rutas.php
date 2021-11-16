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
   
        
    $año = $_POST['año_rodamiento'];
    $mes = $_POST['mes_rodamiento'];
    $ruta = $_POST['id_rutas'];    // se reciben las variables del formulario anterior

    

    $sql="SELECT * FROM rutas WHERE id_rutas = '$ruta' AND id_estado=1";
    $consulta=mysql_query($sql)or die(mysql_error());
    while ($R=mysql_fetch_array($consulta)) 
    {
      $nombre_ruta=$R['nombre_ruta'];   //se hace la busqueda de la ruta en la base de datos
    }

  ?> 

      <br />
      <center>
<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-1">

    <form action="rodamientos.php" method="post"> <!-- donde se hace la insercion de datos -->
      <div class="table-responsive">
        <table style="width: 100%" class="table table-hover table-condensed table-striped">
          <tr>
            <td style="background-color: #f0b650; color: #fff" align="center">
              <h2>&nbsp;</h2>
            </td>
          </tr>
          <tr>
            <td><input type="hidden" name="" /></td>
            <td><input type="hidden" name="" /></td>
            <td><input type="hidden" name="" /></td>
          </tr>
          <tr>
            <td style="width: 100%; text-align: left;"><b>Horario</b></td>
            
          </tr>
         <? 
              //lista el horario de la ruta

             $sql4="SELECT horario FROM detalle_rutas WHERE id_rutas='$ruta'";
                $num=mysql_query($sql4)or die(mysql_error());
                while ($R=mysql_fetch_array($num)) 
                  {
                          
                    $hora = $R['horario'];
                    echo "<tr>";      
                    echo "<td>";
                    echo "<input type='text' name='horario[]' style='width: 80px; border-width: 0' value='$hora' onfocus='this.blur();' >";
                    echo "</td>";
                    echo "</tr>";
                  }

            ?>
            <tr>
              <td>&nbsp;</td>
            </tr>
        </table>
      </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-11">
    <div class="table-responsive"> <!-- se genera la cabecera de la tabla -->
        <table style="width: 100%" class="table table-hover table-condensed table-striped">
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="31" align="center">
              <h2>Plan Rodamiento <?php echo $mes."&nbsp;".$año."&nbsp;".$nombre_ruta; ?></h2>
            </td>
          </tr>
          <tr>
            <td colspan="10"><input type="hidden" name="año_rodamiento" value="<?= $año ?>" ></td>
            <td colspan="11"><input type="hidden" name="mes_rodamiento" value="<?= $mes ?>" ></td>
            <td colspan="11"><input type="hidden" name="id_rutas" value="<?= $ruta ?>" ></td>
          </tr>
          <tr>
            
            <?php
                if ($mes != "Febrero") //se valida que el mes sea diferente de febrero y se hace un ciclo para que genere las columnas de los dias
                {
                  for ($i=1; $i<=31 ; $i++) 
                  { 
                    echo "<td style='width: 2%; text-align: center;'><b>".$i."</b></td>";
                  }
                }
                else
                {
                  for ($i=1; $i<=28 ; $i++) 
                  { 
                    echo "<td style='width: 2%; text-align: center;'><b>".$i."</b></td>";
                  }
                }

                
            ?>
          </tr>
          <?
             // casos para escoger la ruta

            switch ($ruta) 
              {
                  case '1':    // ruta guamo-ibague
                    
                  $sql2="SELECT count(*) as cuenta FROM detalle_rutas WHERE id_rutas='$ruta'";
                  $cont=mysql_query($sql2);
                  $resul=mysql_fetch_assoc($cont); /*se cuentan los registros de la tabla de acuerdo con la ruta que se escogió y dependiendo del numero de filas se van a generar los horarios */

                  $numero=$resul['cuenta'];

                  $filas = $numero;
                  $columnas = 31;

                  if ($mes != "Febrero") //como es diferente de febrero las columnas son 31
                  {
                    
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) //ciclo para las filas
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=$columnas; $j++) // ciclo para las columnas
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo']; /* se hace la consulta a la base de datos para los numeros de buses de acuerdo a las rutas y se guardan en un arreglo [] */     
                             }

                            $numeros2 = $data[array_rand($data)]; /* en la variable numeros2 se guarda en un arreglo los aleatorios de los mismos numeros internos de los buses */
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }

                  }
                else
                  {
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=28; $j++) //como es febrero las columnas son 28
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }
                  }

                    break;

                  case '2':    // ruta ibague-guamo

                  $sql2="SELECT count(*) as cuenta FROM detalle_rutas WHERE id_rutas='$ruta'";
                  $cont=mysql_query($sql2);
                  $resul=mysql_fetch_assoc($cont);

                  $numero=$resul['cuenta'];

                  $filas = $numero;
                  $columnas = 31;

                  if ($mes != "Febrero") 
                  {
                    
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=$columnas; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }

                  }
                else
                  {
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=28; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }
                  }

                    break;

                  case '3':  // ruta guamo-girardot

                  $sql2="SELECT count(*) as cuenta FROM detalle_rutas WHERE id_rutas='$ruta'";
                  $cont=mysql_query($sql2);
                  $resul=mysql_fetch_assoc($cont);

                  $numero=$resul['cuenta'];

                  $filas = $numero;
                  $columnas = 31;

                  if ($mes != "Febrero") 
                  {
                    
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=$columnas; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }

                  }
                else
                  {
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=28; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }
                  }

                  break;

                  case '4':  // ruta girardot-guamo

                  $sql2="SELECT count(*) as cuenta FROM detalle_rutas WHERE id_rutas='$ruta'";
                  $cont=mysql_query($sql2);
                  $resul=mysql_fetch_assoc($cont);

                  $numero=$resul['cuenta'];

                  $filas = $numero;
                  $columnas = 31;

                  if ($mes != "Febrero") 
                  {
                    
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=$columnas; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }

                  }
                else
                  {
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=28; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }
                  }

                  break;

                  case '5': // ruta guamo-purificacion

                  $sql2="SELECT count(*) as cuenta FROM detalle_rutas WHERE id_rutas='$ruta'";
                  $cont=mysql_query($sql2);
                  $resul=mysql_fetch_assoc($cont);

                  $numero=$resul['cuenta'];

                  $filas = $numero;
                  $columnas = 31;

                  if ($mes != "Febrero") 
                  {

                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=$columnas; $j++)
                          {
                            echo "<td>";
                            $data = array();

                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }


                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }

                  }
                else
                  {
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=28; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }
                  }

                  break;

                  case '6':  // ruta purificacion-guamo

                  $sql2="SELECT count(*) as cuenta FROM detalle_rutas WHERE id_rutas='$ruta'";
                  $cont=mysql_query($sql2);
                  $resul=mysql_fetch_assoc($cont);

                  $numero=$resul['cuenta'];

                  $filas = $numero;
                  $columnas = 31;

                  if ($mes != "Febrero") 
                  {
                    
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=$columnas; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }

                  }
                else
                  {
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=28; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }
                  }

                  break;


                  case '7':  // ruta guamo-san luis

                  $sql2="SELECT count(*) as cuenta FROM detalle_rutas WHERE id_rutas='$ruta'";
                  $cont=mysql_query($sql2);
                  $resul=mysql_fetch_assoc($cont);

                  $numero=$resul['cuenta'];

                  $filas = $numero;
                  $columnas = 31;

                  if ($mes != "Febrero") 
                  {
                    
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=$columnas; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }

                  }
                else
                  {
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=28; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }
                  }

                  break;

                  case '8':  // ruta san lui-guamo
                    
                  $sql2="SELECT count(*) as cuenta FROM detalle_rutas WHERE id_rutas='$ruta'";
                  $cont=mysql_query($sql2);
                  $resul=mysql_fetch_assoc($cont);

                  $numero=$resul['cuenta'];

                  $filas = $numero;
                  $columnas = 31;

                  if ($mes != "Febrero") 
                  {
                    
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=$columnas; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }

                  }
                else
                  {
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=28; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }
                  }

                  break;

                  case '9':  // ruta guamo-espinal
                    
                  $sql2="SELECT count(*) as cuenta FROM detalle_rutas WHERE id_rutas='$ruta'";
                  $cont=mysql_query($sql2);
                  $resul=mysql_fetch_assoc($cont);

                  $numero=$resul['cuenta'];

                  $filas = $numero;
                  $columnas = 31;

                  if ($mes != "Febrero") 
                  {
                    
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=$columnas; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }

                  }
                else
                  {
                    echo "<input type='hidden' name='filas' value='$filas' />";
                    for ($i=1; $i<=$filas; $i++) 
                    { 
                      echo "<tr>";
                    
                        for ($j=1; $j<=28; $j++)
                          {
                            echo "<td>";
                            $data = array();
                            $sql="SELECT * FROM rutas_vehiculos WHERE id_rutas='$ruta'";
                            $num=mysql_query($sql)or die(mysql_error());
                            while ($R=mysql_fetch_array($num)) 
                             {
                               $data[] = $R['num_interno_vehiculo'];      
                             }

                            $numeros2 = $data[array_rand($data)];
                            echo "<input type='text' name='dia".$j."[]' style='width: 30px; border-width: 0' value='$numeros2' onfocus='this.blur();' >";
                            echo "</td>";
                              
                          }

                      echo "</tr>";
                    }
                  }

                  break;



                  default:
                    echo "No está disponible esa Ruta";
                    break;

              }
             
              

          ?>
          



          <tr>
            <td align="center" colspan="31">
              <button type="submit" name="datos" class="btn btn-success btn-xs">Guardar Rodamiento</button>
            </td>
          </tr>
        </table>
    </div>
  </div>
</div>
      </form>


    </center>
  
<?php



?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
