<?php
session_start();
include("conexion.php");

if(isset($_SESSION['usuario']))
  {
   $temp=$_SESSION['usuario'];
        if ($temp[0]==2) {
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


      $id_conductor = $temp[0];
      

    $seleccion="SELECT * FROM conductores,estado
                WHERE conductores.id_estado=estado.id_estado 
                AND id_conductor= '$id_conductor'";
    $resul=mysql_query($seleccion)or die(mysql_error());
    if ($R=mysql_fetch_array($resul))
    { 
?> 

      <br />
      <center>
      <form action="update_conductor.php" method="post">
        <table style="width: 40%;" class="table table-hover table-condensed">
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="2" align="center">
              <h2>Datos del Conductor</h2>
            </td>
          </tr>
          <tr>
            <td colspan="2"><input type="hidden" name="id_conductor" value="<?= $R['id_conductor'] ?>"/></td>
          </tr>
          <tr>
            <td style="width: 25%;">Documento </td>
            <td style="width: 15%;">
              <input class="form-control" type="number" name="documento_conductor" value="<?= $R['documento_conductor'] ?>" style="width: 250px; height: 30px" />
            </td>
          </tr>
          <tr>
            <td style="width: 25%">Nombres </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="nombres_conductor" value="<?= $R['nombres_conductor'] ?>" style="width: 250px; height: 30px" />
            </td>
          </tr>
          <tr>
            <td style="width: 25%">Apellidos </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="apellidos_conductor" value="<?= $R['apellidos_conductor'] ?>" style="width: 250px; height: 30px" />
            </td>
          </tr>
          <tr>
            <td style="width: 25%">Dirección </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="direccion_conductor" value="<?= $R['direccion_conductor'] ?>" style="width: 250px; height: 30px" />
            </td>
          </tr>
          <tr>
            <td style="width: 25%">Celular </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="celular_conductor" value="<?= $R['celular_conductor'] ?>" style="width: 250px; height: 30px" />
            </td>
          </tr>
          <tr>
            <td style="width: 25%">E-Mail </td>
            <td style="width: 15%">
              <input class="form-control" type="email" name="email" value="<?= $R['email'] ?>" style="width: 250px; height: 30px" />
            </td>
          </tr>
          <tr>
            <td style="width: 25%">Licencia </td>
            <td style="width: 15%">
              <input class="form-control" type="number" name="" value="<?= $R['licencia_conductor'] ?>" style="width: 250px; height: 30px" disabled />
            </td>
          </tr>
          <tr>
            <td style="width: 25%">Vigencia Licencia </td>
            <td style="width: 15%">
              <input class="form-control" type="date" name="vigencia_licencia" value="<?= $R['vigencia_licencia'] ?>" style="width: 250px; height: 30px" />
            </td>
          </tr>
          <tr>
            <td style="width: 25%">Categoría Licencia </td>
            <td style="width: 15%">
              <select name="id_categoria" style="width: 250px; height:27px" >
               <option value=""> Selecciona la Categoria de la Licencia </option>
                        <?php
                        include("conexion.php");

                        $sql="SELECT * FROM categorias";
                        $consulta=mysql_query($sql);
                        while ($reg=mysql_fetch_array($consulta)) 
                        {
                          if($reg['id_categoria']==$R['id_categoria'])
                          {
                          echo '<option value="'.$reg['id_categoria'].'" selected>'.$reg['categoria'].'</option>';
                          }
                          else
                          {
                          echo '<option value="'.$reg['id_categoria'].'">'.$reg['categoria'].'</option>';
                          }
                        }
                      ?>
            </select>
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
                echo "<h2>No se Encuentran Datos del Conductor</h2>";
                echo "</center>";
          }


?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
