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
      <form action="datos_admin.php" method="post">
        
        <table style="width: 50%"  class="table table-condensed table-hover">
          <tr>
            <td colspan="2" align="center" style="background-color: #f0b650; color: #fff"><h3>Actualizar Administrador</h3></td>
          </tr>
          <tr>
            <td align="left" style="width: 40%"><h4>Número del Documento del Admiistrador</h4></td>
            <td style="width: 10%"><input class="form-control" type="number" name="documento_usuario" style="width:250px; height:30px" required /></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><button type="submit" name="datos" class="btn btn-success btn-sm">Buscar</button></td>
          </tr>
        </table>
      </form>
    </center> 
           <br /><br />






<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
