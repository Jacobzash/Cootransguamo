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
        <table style="width: 40%" class="table table-hover table-condensed">
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="2" align="center">
              <h2>Asignar Vehiculo</h2>
            </td>
          </tr>
          <tr>
            <td style="width: 20%">Conductor </td>
            <td style="width: 20%">
              <select  name="id_conductor" style="width: 300px; height:27px" required >
                  <option value=""> Seleccione el Conductor        </option>
                  <?php
                    include("conexion.php");

                     $sql="SELECT * FROM conductores";
                     $consulta=mysql_query($sql);
                     while ($reg=mysql_fetch_array($consulta)) 
                     {
                        echo '<option value="'.$reg['id_conductor'].'">'.$reg['nombres_conductor'].'&nbsp;'.$reg['apellidos_conductor'].'</option>';
                     }
                   ?>
              </select>
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Número Interno Vehiculo </td>
            <td style="width: 15%">
              <select  name="num_interno_vehiculo" style="width: 300px; height:27px; text-transform: uppercase;" required >
                  <option value=""> Seleccione la Placa del Vehiculo        </option>
                  <?php
                    include("conexion.php");

                     $sql="SELECT * FROM vehiculos";
                     $consulta=mysql_query($sql);
                     while ($reg=mysql_fetch_array($consulta)) 
                     {
                        echo '<option value="'.$reg['num_interno_vehiculo'].'">'.$reg['placa_vehiculo'].'</option>';
                     }
                   ?>
              </select>
            </td>
          </tr>
          <tr>
            <td align="center" colspan="2">
              <button type="submit" name="datos" class="btn btn-success btn-xs">Asignar Vehiculo</button>
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
            
    if(isset($_POST['id_conductor']) && !empty($_POST['id_conductor']) && 
       isset($_POST['num_interno_vehiculo']) && !empty($_POST['num_interno_vehiculo']))
    {
        $id_conductor = ($_POST['id_conductor']);
        $num_interno_vehiculo = ($_POST['num_interno_vehiculo']);
        
               
                $sql="INSERT INTO asignar (num_interno_vehiculo,id_conductor)

                              VALUES ('$num_interno_vehiculo','$id_conductor')";

                $insertar=mysql_query($sql) or die(mysql_error());

                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h2>Se Asignó el vahiculo al Conductor Satifactoriamente</h2>";
                echo "<meta http-equiv='Refresh' content='3;url=asignar_conductor.php'>";
                echo "</center>";
            


        


    }
      else
        {
      
              echo "<center><br /><br /><br /><br /><br /><br />";
              echo "<h2>Faltan datos del formulario</h2>";
              echo "<meta http-equiv='Refresh' content='3;url=asignar_conductor.php'>";
              echo "</center>";
        }

}

?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
