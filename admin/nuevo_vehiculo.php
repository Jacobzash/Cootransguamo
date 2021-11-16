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
<script type="text/javascript">
    $(document).ready(function(){
        
      $("#add").click(function(){
        var tds=$("#tabla tr:first td").length;
        var trs=$("#tabla tr").length;
        var nuevaFila="<tr>";
          cant = $('#contador-filas').val();
          cant++;
          $('#contador-filas').val(cant)
          nuevaFila+="<td>Ruta </td>"+
                     "<td><select class='form-control' name='id_rutas["+(cant)+"]' style='height: 27px' required >"+ 
                          "<option value=''>------------</option>"+
                          "<option value='1'> Guamo-Ibague </option>"+
                          "<option value='2'> Ibague-Guamo </option>"+
                          "<option value='3'> Guamo-Girardot </option>"+
                          "<option value='4'> Girardot-Guamo </option>"+
                          "<option value='5'> Guamo-Purificacion </option>"+
                          "<option value='6'> Purificacion-Guamo </option>"+
                          "<option value='7'> Guamo-San Luis </option>"+
                          "<option value='8'> San Luis-Guamo </option>"+
                          "<option value='9'> Guamo-Espinal </option>"+
                     "</select>"+
                     "</td>";
        
          nuevaFila+="</tr>";
          $("#tabla").append(nuevaFila);
        });
       
        $("#del").click(function(){
            var trs=$("#tabla tr").length;
            if(trs>1)
            {
                cant--;
                $('#contador-filas').val(cant)
                $("#tabla tr:last").remove();

            }
        });
    });
    </script>
</head>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<body>
<?php
  if (!isset($_POST['datos'])) 
   {  
        
  ?> 

      <br />
      <center>
      <form action="" method="post">
        <table style="width: 60%" class="table table-hover table-condensed" >
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="4" align="center" >
              <h2>Nuevo Vehículo</h2>
            </td>
          </tr>
          <tr>
            <td>Número Interno </td>
            <td align="right">
              <input class="form-control" type="number" name="num_interno_vehiculo" style="width: 200px; height: 27px;" oninput='maxLengthCheck(this)' maxlength="10" required autofocus />
            </td>
            <td>Placa </td>
            <td align="right">
              <input class="form-control" type="text" name="placa_vehiculo" style="width: 200px; height: 27px; text-transform:uppercase" maxlength="6" required />
            </td>
          </tr>
          <tr>
            <td>Tipo Vehículo </td>
            <td align="right">
              <select  name="id_tipo_vehiculo" style="width: 200px; height:27px" required >
                  <option value=""> Seleccione Tipo Vehiculo       </option>
                  <?php
                    include("conexion.php");

                     $sql="SELECT * FROM tipo_vehiculo";
                     $consulta=mysql_query($sql);
                     while ($reg=mysql_fetch_array($consulta)) 
                     {
                        echo '<option value="'.$reg['id_tipo_vehiculo'].'">'.$reg['tipo_vehiculo'].'</option>';
                     }
                   ?>
              </select>
            </td>
            <td>Modelo </td>
            <td align="right">
              <input class="form-control" type="number" name="modelo_vehiculo" style="width: 200px; height: 27px" oninput='maxLengthCheck(this)' maxlength="4" required />
            </td>
          </tr>
          <tr>
            <td>Cilindraje </td>
            <td align="right">
              <input class="form-control" type="number" name="cilindraje_vehiculo" style="width: 200px; height: 27px" oninput='maxLengthCheck(this)' maxlength="4" required  />
            </td>
            <td>Número Motor </td>
            <td align="right">
              <input class="form-control" type="text" name="num_motor_vehiculo" style="width: 200px; height: 27px; text-transform: uppercase;"  required />
            </td>
          </tr>
          <tr>
            <td>Marca </td>
            <td align="right">
              <input class="form-control" type="text" name="marca_vehiculo" style="width: 200px; height: 27px" required  />
            </td>
            <td>Clase </td>
            <td align="right">
              <input class="form-control" type="text" name="clase_vehiculo" style="width: 200px; height: 27px" required />
            </td>
          </tr>
          <tr>
            <td>Capacidad </td>
            <td align="right">
              <input class="form-control" type="number" name="capacidad_vehiculo" style="width: 200px; height: 27px" oninput='maxLengthCheck(this)' maxlength="2" required  />
            </td>
            <td>Vin </td>
            <td align="right">
              <input class="form-control" type="text" name="vin_vehiculo" style="width: 200px; height: 27px" required />
            </td>
          </tr>
          <tr>
            <td>Soat </td>
            <td align="right">
              <input class="form-control" type="number" name="soat_vehiculo" style="width: 200px; height: 27px; text-transform: uppercase;" required />
            </td>
            <td>Vigencia Soat </td>
            <td align="right">
              <input class="form-control" type="date" name="vigencia_soat" style="width: 200px; height: 27px" required  />
            </td>
          </tr>
          <tr>
            <td>Tecnomecanica </td>
            <td align="right">
              <input class="form-control" type="text" name="tecno_vehiculo" style="width: 200px; height: 27px; text-transform: uppercase;" required />
            </td>
            <td>Vigencia Tecnomecanica </td>
            <td align="right">
              <input class="form-control" type="date" name="vigencia_tecno" style="width: 200px; height: 27px" required  />
            </td>
          </tr>
          <tr>
            <td>Licencia Vehiculo </td>
            <td align="right">
              <input class="form-control" type="number" name="licencia_transito_vehiculo" style="width: 200px; height: 27px"  required />
            </td>
            <td>Vigencia Licencia </td>
            <td align="right">
              <input class="form-control" type="date" name="vigencia_licencia" style="width: 200px; height: 27px" required  />
            </td>
          </tr>
        </table>

        <div>
          <font face="Arial,helvetica" size="4" color="red"> * </font>
          <label>Agregar una o más Rutas para este Vehiculo </label><br />
            
              <button id="add" class="btn btn-xs btn-success">Agregar Ruta</button>
              <button id="del" class="btn btn-xs btn-danger">Eliminar Ruta</button>
            
        </div>
        <br />
        <table style="width: 35%" class="table table-hover table-condensed" id="tabla">
          
          <tbody>
            <tr class="fila-0">
              <input type="hidden" id="contador-filas" value="0" />
              <td style="width: 20%">Ruta</td>
              <td style="width: 15%">
                <select class="form-control" name="id_rutas[0]" style="height: 27px" required="">
                  <option value=""> Selecciona la Ruta </option>
                  <?php
                    include("conexion.php");

                     $sql="SELECT * FROM rutas WHERE id_estado=1";
                     $consulta=mysql_query($sql);
                     while ($reg=mysql_fetch_array($consulta)) 
                     {
                        echo '<option value="'.$reg['id_rutas'].'">'.$reg['nombre_ruta'].'</option>';
                     }
                   ?>
                  
                </select>
                
            </tr>
            </tbody>
          </table>
          
            <div>
              <button type="submit" name="datos" class="btn btn-success btn-xs">Agregar</button> 
            </div>
      </form>
    </center>
  
<?php
}
else
{
  include("conexion.php");    
            
    if(isset($_POST['num_interno_vehiculo']) && !empty($_POST['num_interno_vehiculo']) && 
       isset($_POST['placa_vehiculo']) && !empty($_POST['placa_vehiculo']) && 
       isset($_POST['id_tipo_vehiculo']) && !empty($_POST['id_tipo_vehiculo']) &&
       isset($_POST['modelo_vehiculo']) && !empty($_POST['modelo_vehiculo']) && 
       isset($_POST['cilindraje_vehiculo']) && !empty($_POST['cilindraje_vehiculo']) && 
       isset($_POST['num_motor_vehiculo']) && !empty($_POST['num_motor_vehiculo']) &&
       isset($_POST['marca_vehiculo']) && !empty($_POST['marca_vehiculo']) &&
       isset($_POST['clase_vehiculo']) && !empty($_POST['clase_vehiculo']) &&
       isset($_POST['capacidad_vehiculo']) && !empty($_POST['capacidad_vehiculo']) &&
       isset($_POST['soat_vehiculo']) && !empty($_POST['soat_vehiculo']) &&
       isset($_POST['vigencia_soat']) && !empty($_POST['vigencia_soat']) &&
       isset($_POST['tecno_vehiculo']) && !empty($_POST['tecno_vehiculo']) &&
       isset($_POST['vigencia_tecno']) && !empty($_POST['vigencia_tecno']) &&
       isset($_POST['licencia_transito_vehiculo']) && !empty($_POST['licencia_transito_vehiculo']) &&
       isset($_POST['vigencia_licencia']) && !empty($_POST['vigencia_licencia']) &&
       isset($_POST['vin_vehiculo']) && !empty($_POST['vin_vehiculo']) &&
       isset($_POST['id_rutas']) && !empty($_POST['id_rutas']))
    {
        $num_interno_vehiculo = ($_POST['num_interno_vehiculo']);
        $placa_vehiculo = strtoupper($_POST['placa_vehiculo']);
        $id_tipo_vehiculo = ($_POST['id_tipo_vehiculo']);
        $modelo_vehiculo = ($_POST['modelo_vehiculo']);
        $cilindraje_vehiculo = ($_POST['cilindraje_vehiculo']);
        $num_motor_vehiculo = ($_POST['num_motor_vehiculo']);
        $marca_vehiculo = ($_POST['marca_vehiculo']);
        $clase_vehiculo = ($_POST['clase_vehiculo']);
        $capacidad_vehiculo = ($_POST['capacidad_vehiculo']);
        $soat_vehiculo = ($_POST['soat_vehiculo']);
        $vigencia_soat = ($_POST['vigencia_soat']);
        $tecno_vehiculo = ($_POST['tecno_vehiculo']);
        $vigencia_tecno = ($_POST['vigencia_tecno']);
        $licencia_transito_vehiculo = ($_POST['licencia_transito_vehiculo']);
        $vigencia_licencia = ($_POST['vigencia_licencia']);
        $vin_vehiculo = ($_POST['vin_vehiculo']);
        $id_rutas = ($_POST['id_rutas']);
        $id_estado = 1;

        date_default_timezone_set("America/Bogota");
        $fecha_alta = date("Y-m-d");
        


        $seleccion="SELECT * FROM vehiculos WHERE placa_vehiculo='$placa_vehiculo'";
        $resul=mysql_query($seleccion)or die(mysql_error());
        $R=mysql_fetch_array($resul);
        

             if($placa_vehiculo==$R['placa_vehiculo']) 
             {
               
                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h3>El Vehículo ya se encuentra Registrado</h3>";
                echo "<meta http-equiv='Refresh' content='3;url=nuevo_vehiculo.php'>";
                echo "</center>";

             }
             else
             {
               
                $sql="INSERT INTO vehiculos (num_interno_vehiculo,
                                                placa_vehiculo,
                                                id_tipo_vehiculo,
                                                modelo_vehiculo,
                                                cilindraje_vehiculo,
                                                num_motor_vehiculo,
                                                marca_vehiculo,
                                                clase_vehiculo,
                                                capacidad_vehiculo,
                                                soat_vehiculo,
                                                vigencia_soat,
                                                tecno_vehiculo,
                                                vigencia_tecno,
                                                licencia_transito_vehiculo,
                                                vigencia_licencia,
                                                vin_vehiculo,
                                                id_estado,
                                                fecha_alta)
                              VALUES ('$num_interno_vehiculo',
                                      '$placa_vehiculo',
                                      '$id_tipo_vehiculo',
                                      '$modelo_vehiculo',
                                      '$cilindraje_vehiculo',
                                      '$num_motor_vehiculo',
                                      '$marca_vehiculo',
                                      '$clase_vehiculo',
                                      '$capacidad_vehiculo',
                                      '$soat_vehiculo',
                                      '$vigencia_soat',
                                      '$tecno_vehiculo',
                                      '$vigencia_tecno',
                                      '$licencia_transito_vehiculo',
                                      '$vigencia_licencia',
                                      '$vin_vehiculo',
                                      '$id_estado',
                                      '$fecha_alta')";

                $insertar=mysql_query($sql) or die(mysql_error());

                foreach ($id_rutas as $value) 
                {

                  $sql3="INSERT INTO rutas_vehiculos (id_rutas,num_interno_vehiculo) VALUES ('$value','$num_interno_vehiculo')";
                  $consulta=mysql_query($sql3) or die(mysql_error());
                }

                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h2>El Vehículo se ha Registrado Satisfactoriamente</h2>";
                echo "<meta http-equiv='Refresh' content='3;url=nuevo_vehiculo.php'>";
                echo "</center>";
             }


        


    }
      else
        {
      
              echo "<center><br /><br /><br /><br /><br /><br />";
              echo "<h2>Faltan datos del formulario</h2>";
              echo "<meta http-equiv='Refresh' content='3;url=nuevo_vehiculo.php'>";
              echo "</center>";
        }

}

?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
