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
<script>
  function maxLengthCheck(object) {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
    
  function isNumeric (evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode (key);
    var regex = /[0-9]|\./;
    if ( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
</script>
</head>
<body>
<?php

    include("conexion.php");


if(isset($_POST['placa_vehiculo']) && !empty($_POST['placa_vehiculo'])) 
 {

      $placa_vehiculo = $_POST['placa_vehiculo'];
      

    $seleccion="SELECT * FROM vehiculos,tipo_vehiculo,estado
                WHERE vehiculos.id_estado=estado.id_estado 
                AND vehiculos.id_tipo_vehiculo=tipo_vehiculo.id_tipo_vehiculo
                AND placa_vehiculo= '$placa_vehiculo'";
    $resul=mysql_query($seleccion,$con);
    if ($R=mysql_fetch_array($resul))
    { 
      $numero = $R['num_interno_vehiculo'];
?> 

      <br />
      <center>
      <form action="update_vehiculo.php" method="post">
        <table style="width: 60%" class="table table-hover table-condensed">
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="4" align="center">
              <h2>Datos del Vehiculo</h2>
            </td>
          </tr>
          <tr>
            <td>Número Interno </td>
            <td align="right">
              <input class="form-control" type="hidden" name="num_interno_vehiculo" value="<?= $R['num_interno_vehiculo'] ?>" style="width: 200px; height: 27px;" />
              <label class="form-control" style="width: 200px; height: 27px; text-align: left;" disabled ><?php echo $numero; ?></label>
            </td>
            <td>Placa </td>
            <td align="right">
              <input class="form-control" type="text" name="" value="<?= $R['placa_vehiculo'] ?>" style="width: 200px; height: 27px; text-transform:uppercase" disabled />
            </td>
          </tr>
          <tr>
            <td>Tipo Vehículo </td>
            <td align="right">
            <input class="form-control" type="text" name="" value="<?= $R['tipo_vehiculo'] ?>" style="width: 200px; height: 27px;" disabled />
            </td>
            <td>Modelo </td>
            <td align="right">
              <input class="form-control" type="number" name="" value="<?= $R['modelo_vehiculo'] ?>" style="width: 200px; height: 27px" disabled />
            </td>
          </tr>
          <tr>
            <td>Cilindraje </td>
            <td align="right">
              <input class="form-control" type="number" name="" value="<?= $R['cilindraje_vehiculo'] ?>" style="width: 200px; height: 27px" disabled />
            </td>
            <td>Número Motor </td>
            <td align="right">
              <input class="form-control" type="text" name="" value="<?= $R['num_motor_vehiculo'] ?>" style="width: 200px; height: 27px;" disabled />
            </td>
          </tr>
          <tr>
            <td>Marca </td>
            <td align="right">
              <input class="form-control" type="text" name="" value="<?= $R['marca_vehiculo'] ?>" style="width: 200px; height: 27px" disabled  />
            </td>
            <td>Clase </td>
            <td align="right">
              <input class="form-control" type="text" name="clase_vehiculo" value="<?= $R['clase_vehiculo'] ?>" style="width: 200px; height: 27px" />
            </td>
          </tr>
          <tr>
            <td>Capacidad </td>
            <td align="right">
              <input class="form-control" type="number" name="capacidad_vehiculo" value="<?= $R['capacidad_vehiculo'] ?>" style="width: 200px; height: 27px" oninput='maxLengthCheck(this)' maxlength="2" />
            </td>
            <td>Vin </td>
            <td align="right">
              <input class="form-control" type="text" name="" value="<?= $R['vin_vehiculo'] ?>" style="width: 200px; height: 27px" disabled />
            </td>
          </tr>
          <tr>
            <td>Soat </td>
            <td align="right">
              <input class="form-control" type="number" name="soat_vehiculo" value="<?= $R['soat_vehiculo'] ?>" style="width: 200px; height: 27px; text-transform: uppercase;"  />
            </td>
            <td>Vigencia Soat </td>
            <td align="right">
              <input class="form-control" type="date" name="vigencia_soat" value="<?= $R['vigencia_soat'] ?>" style="width: 200px; height: 27px" />
            </td>
          </tr>
          <tr>
            <td>Tecnomecanica </td>
            <td align="right">
              <input class="form-control" type="text" name="tecno_vehiculo" value="<?= $R['tecno_vehiculo'] ?>" style="width: 200px; height: 27px; text-transform: uppercase;" />
            </td>
            <td>Vigencia Tecnomecanica </td>
            <td align="right">
              <input class="form-control" type="date" name="vigencia_tecno" value="<?=$R['vigencia_tecno'] ?>" style="width: 200px; height: 27px" />
            </td>
          </tr>
          <tr>
            <td>Licencia Vehiculo </td>
            <td align="right">
              <input class="form-control" type="number" name="licencia_transito_vehiculo" value="<?= $R['licencia_transito_vehiculo']?>" style="width: 200px; height: 27px" />
            </td>
            <td>Vigencia Licencia </td>
            <td align="right">
              <input class="form-control" type="date" name="vigencia_licencia" value="<?= $R['vigencia_licencia'] ?>" style="width: 200px; height: 27px" />
            </td>
          </tr>
          <tr>
            <td>Estado </td>
            <td align="right">
              <select name="id_estado" style="width: 200px; height:27px" >
               <option value=""> Selecciona el Estado del Vehiculo </option>
                        <?php
                        include("conexion.php");

                        $sql="SELECT * FROM estado";
                        $consulta=mysql_query($sql);
                        while ($reg=mysql_fetch_array($consulta)) 
                        {
                          if($reg['id_estado']==$R['id_estado'])
                          {
                          echo '<option value="'.$reg['id_estado'].'" selected>'.$reg['estado'].'</option>';
                          }
                          else
                          {
                          echo '<option value="'.$reg['id_estado'].'">'.$reg['estado'].'</option>';
                          }
                        }
                      ?>
            </select>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="center" colspan="4">
              <button type="submit" name="datos" class="btn btn-success btn-xs">Guardar</button>
            </td>
          </tr>
        </table>
      </form>
    </center>
  
<?php
    
    }
    else
          {
        
                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h2>No se Encuentra el Vehiculo</h2>";
                echo "<meta http-equiv='Refresh' content='3;url=actualizar_vehiculo.php'>";
                echo "</center>";
          }

 }
else
{
  
    echo "<center><br /><br /><br /><br /><br /><br />";
    echo "<h2>Faltan Datos del Formulario</h2>";
    echo "<meta http-equiv='Refresh' content='3;url=actualizar_vehiculo.php'>";
    echo "</center>";
}




?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
