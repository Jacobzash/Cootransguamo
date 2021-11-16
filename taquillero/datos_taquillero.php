<?php
session_start();
include("conexion.php");

if(isset($_SESSION['usuario']))
  {
   $temp=$_SESSION['usuario'];
        if ($temp[0]==4) {
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


      $id_taquillero = $temp[0];
      

    $seleccion="SELECT * FROM taquilleros,estado
                WHERE taquilleros.id_estado=estado.id_estado 
                AND id_taquillero= '$id_taquillero'";
    $resul=mysql_query($seleccion,$con);
    if ($R=mysql_fetch_array($resul))
    { 
?> 

      <br />
      <center>
      <form action="update_taquillero.php" method="post">
        <table style="width: 30%;" class="table table-hover table-condensed">
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="2" align="center">
              <h2>Datos del Taquillero</h2>
            </td>
          </tr>
          <tr>
            <td colspan="2"><input type="hidden" name="id_taquillero" value="<?= $R['id_taquillero'] ?>"/></td>
          </tr>
          <tr>
            <td style="width: 15%;">Documento </td>
            <td style="width: 15%;">
              <input class="form-control" type="number" name="documento_taquillero" value="<?= $R['documento_taquillero'] ?>" style="width: 250px; height: 30px" />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Nombres </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="nombres_taquillero" value="<?= $R['nombres_taquillero'] ?>" style="width: 250px; height: 30px" />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Apellidos </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="apellidos_taquillero" value="<?= $R['apellidos_taquillero'] ?>" style="width: 250px; height: 30px" />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Dirección </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="direccion_taquillero" value="<?= $R['direccion_taquillero'] ?>" style="width: 250px; height: 30px" />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Celular </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="celular_taquillero" value="<?= $R['celular_taquillero'] ?>" style="width: 250px; height: 30px" />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">E-Mail </td>
            <td style="width: 15%">
              <input class="form-control" type="email" name="email" value="<?= $R['email'] ?>" style="width: 250px; height: 30px" />
            </td>
          </tr>
          <tr>
            <td align="center" colspan="2">
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
                echo "<h2>No se Encuentran Datos del Taquillero</h2>";
                echo "</center>";
          }


?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
