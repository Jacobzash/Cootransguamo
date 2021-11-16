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


      <br />
      <center>
      <form action="tablas_rutas.php" method="post">
        <table style="width: 50%" class="table table-hover table-condensed">
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="2" align="center">
              <h2>Plan de Rodamiento</h2>
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
                    <?
                      $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio',
                                      'Agosto','Septiembre','Octubre','Noviembre','Diciembre');

                      
                      $nombre = 'mes_rodamiento';
                      $resultado = lista($nombre, $meses);
                      echo $resultado;
                

                      function lista($nombre, $meses)
                      {
                        $array = $meses;
                        $txt= "<select name='$nombre' id='$nombre' style='width:300px; height:27px' required >";
                        $txt .= "<option value=''>Seleccione el Mes del Rodamiento </option>";

                        for ($i=0; $i<sizeof($array); $i++)
                         {
                            $txt .= "<option value='$array[$i]'>". $array[$i] . '</option>';
                         }
                            $txt .= '</select>';
                        return $txt;
                      }
                    ?>
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
              <button type="submit" name="datos" class="btn btn-success btn-xs">Cargar Rodamiento</button>
            </td>
          </tr>
        </table>
      </form>
    </center>
  



<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
