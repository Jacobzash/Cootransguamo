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
        <table style="width: 50%" class="table table-hover table-condensed">
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="2" align="center">
              <h2>Ver Plan de Rodamiento</h2>
            </td>
          </tr>
          <tr>
            <td style="width: 25%">Año del Rodamiento</td>
            <td style="width: 25%">
                    <select  name="año_rodamiento" style="width:300px; height:27px" required >
                        <option value=""> Seleccione el Año del Rodamiento </option>
                          <?php
                          include("conexion.php");

                          date_default_timezone_set("America/Bogota");

                          $año_actual=date("Y");
                          $año_proximo=$año_actual+1;


                          for ($i=2018; $i < $año_proximo; $i++) 
                          { 
                            echo '<option value="'.$i.'">'.$i.'</option>';

                          }

                          
                        ?>
                    </select>
            </td>
          </tr>
          <tr>
            <td style="width: 25%">Mes del Rodamiento</td>
            <td style="width: 25%">
                    <select  name="mes_rodamiento" style="width:300px; height:27px" required >
                        <option value=""> Seleccione el Mes del Rodamiento </option>
                        <option value="Enero">Enero</option>
                        <option value="Febrero">Febrero</option>
                        <option value="Marzo">Marzo</option>
                        <option value="Abril">Abril</option>
                        <option value="Mayo">Mayo</option>
                        <option value="Junio">Junio</option>
                        <option value="Julio">Julio</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Septiembre">Septiembre</option>
                        <option value="Octubre">Octubre</option>
                        <option value="Noviembre">Noviembre</option>
                        <option value="Diciembre">Diciembre</option>
                    </select>
            </td>
          </tr>
          <tr>
            <td style="width: 25%">Ruta del Rodamiento</td>
            <td style="width: 25%">
                <select  name="id_rutas" style="width: 300px; height:27px" required >
                  <option value=""> Seleccione la Ruta del Rodamiento </option>
                  <?php
                    include("conexion.php");

                     $sql="SELECT * FROM rutas";
                     $consulta=mysql_query($sql);
                     while ($reg=mysql_fetch_array($consulta)) 
                     {
                        echo '<option value="'.$reg['id_rutas'].'">'.$reg['nombre_ruta'].'</option>';
                     }
                   ?>
              </select>
            </td>
          </tr>
          <tr>
            <td align="center" colspan="2">
              <button type="submit" name="datos" class="btn btn-success btn-xs">Ver Rodamiento</button>
            </td>
          </tr>
        </table>
      </form>
    </center>

<?php
}
else
{
  include("conexion.php");  

      $año_rodamiento = $_POST['año_rodamiento'];
      $mes_rodamiento = $_POST['mes_rodamiento'];
      $id_rutas = $_POST['id_rutas'];

        $sql="SELECT * FROM rutas WHERE id_rutas = '$id_rutas' AND id_estado=1";
        $consulta=mysql_query($sql)or die(mysql_error());
        while ($R=mysql_fetch_array($consulta)) 
        {
          $nombre_ruta=$R['nombre_ruta'];
        }


        $seleccion="SELECT * FROM rodamientos,detalle_rodamiento 
                    WHERE rodamientos.id_rodamiento=detalle_rodamiento.id_rodamiento
                    AND rodamientos.id_rutas='$id_rutas' 
                    AND rodamientos.mes_rodamiento='$mes_rodamiento' 
                    AND rodamientos.año_rodamiento='$año_rodamiento'";
        $resul=mysql_query($seleccion)or die(mysql_error());
        $resultado = mysql_num_rows($resul);             

        if($resultado > 0) 
        { 

   ?>
      <div class="table-responsive">
        <table style="width: 100%" class="table table-hover table-condensed table-striped">
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="32" align="center">
              <h2>Plan Rodamiento <?php echo $mes_rodamiento."&nbsp;".$año_rodamiento."&nbsp;".$nombre_ruta; ?></h2>
            </td>
          </tr>
          <tr>
            <td colspan="32">&nbsp;</td>
            
          </tr>
          <tr>
  <?
          if ($mes_rodamiento != "Febrero") 
          {
  ?>
              <td style='width: 5%; text-align: center;'><b>Horario</b></td>
  <?            
              for ($i=1; $i<=31 ; $i++) 
                { 
                  echo "<td style='width: 2%; text-align: left;'><b>".$i."</b></td>";
                }
  ?>
          </tr>

  <?
           while($R=mysql_fetch_array($resul))
           {
  ?>      
            <tr>
              <td style='width: 5%; text-align: center;'><? echo $R['horario'];?></td> 

  <?  
              
              for ($j=1; $j<=31; $j++)
                {
  ?>
                  <td><? echo $R["dia$j"]; ?></td>
  <?            
                }
  ?>
            </tr>

  <?                 
           }
  ?>
           <tr>
              <td colspan="32" align="center">
                <button class='btn btn-success btn-sm' value='Imprimir' onclick='window.print()'><i class='fa fa-print'></i>&nbsp;Imprimir</button>
              </td>
            </tr>
  <?

          }
          else
          {
  ?>
            <tr>
              <td style='width: 5%; text-align: center;'><b>Horario</b></td>
  <?            
              for ($i=1; $i<=28 ; $i++) 
                { 
                  echo "<td style='width: 2%; text-align: left;'><b>".$i."</b></td>";
                }
  ?>
           </tr>

  <?
           while($R=mysql_fetch_array($resul))
           {
  ?>      
            <tr>
              <td style='width: 5%; text-align: center;'><? echo $R['horario'];?></td> 

  <?  
              for ($j=1; $j<=28; $j++)
                {
  ?>
                  <td><? echo $R["dia$j"]; ?></td>
  <?            
                }
  ?>
            </tr>
  <?
           }
  ?>
           <tr>
              <td colspan="32" align="center">
                <button class='btn btn-success btn-sm' value='Imprimir' onclick='window.print()'><i class='fa fa-print'></i>&nbsp;Imprimir</button>
              </td>
            </tr>
          </table>
        </div>
  <?
          }


        }
        else
          {
             echo "<center><br /><br /><br /><br /><br /><br />";
             echo "<h2>No Existe Plan de Rodamiento Para Ese Periodo </h2>";
             echo "<meta http-equiv='Refresh' content='3;url=listar_rodamiento.php'>";
             echo "</center>";
           }
}

?>

<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
