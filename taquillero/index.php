<?php
session_start();
include("conexion.php");

if(isset($_SESSION['usuario']))
  {
   $temp=$_SESSION['usuario'];
        if ($temp[0]==4) 
        {
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
<!-- primer contenedor carrusel imagenes--> 
<div class="container-fluid">
    <div class="row">

    <?php include("cabecera_taquillero.php");?>
        
  </div>
   
<!--fin del primer contenedor-->

<!-- segundo contenedor cuerpo de la pagina, formularios -->
<div class="row">
        <div class="col-xs-12">
        <br /><br /><br />
          <table width="100%">
            <tr>   
              <td align="center">
                <iframe name="principal"  width="100%" height="570px" allowtransparency=”true” frameborder="0" src=""></iframe>
              </td>
            </tr>
          </table>


        </div>
    </div>
</div>

<!-- fin del segundo contenedor -->

<!--tercer contenedor pie de página-->

<div class="container-fluid text-center footer">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <br />    
        <!--<img src="img/logo2.png" title="" width="120" height="110"><br /><br />-->
        <font color="#fff"><p class="text-center">
        |&nbsp;<span class="glyphicon glyphicon-home"></span>&nbsp;Cootransguamo &nbsp;&nbsp;| 
        <span class="glyphicon glyphicon-envelope"></span>&nbsp;E-mail: contacto@cootransguamo.com &nbsp;|<br>
        |&nbsp;<span class="glyphicon glyphicon-earphone"></span>&nbsp;Oficina Principal: (578)2270240 &nbsp;|
        &nbsp; Agencia Guamo: 3185147651 &nbsp;|&nbsp; Agencia Espinal: 3185147656 - 3185147686 &nbsp;| 
        &nbsp;Agencia Ibagué: 3185147668 - 3138910319 &nbsp;| <br />
        |&nbsp;CopyRight &nbsp;<span class="glyphicon glyphicon-copyright-mark"></span>&nbsp; 2021 &nbsp;|</p></font>
          
    </div>
  </div>
</div>

<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
