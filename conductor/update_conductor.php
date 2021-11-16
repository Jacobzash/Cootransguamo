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
            
    if(isset($_POST['id_conductor']) && !empty($_POST['id_conductor']) && 
       isset($_POST['documento_conductor']) && !empty($_POST['documento_conductor']) && 
       isset($_POST['nombres_conductor']) && !empty($_POST['nombres_conductor']) &&
       isset($_POST['apellidos_conductor']) && !empty($_POST['apellidos_conductor']) && 
       isset($_POST['direccion_conductor']) && !empty($_POST['direccion_conductor']) && 
       isset($_POST['celular_conductor']) && !empty($_POST['celular_conductor']) &&
       isset($_POST['email']) && !empty($_POST['email']) &&
       isset($_POST['vigencia_licencia']) && !empty($_POST['vigencia_licencia']) &&
       isset($_POST['id_categoria']) && !empty($_POST['id_categoria']))
    {
        $id_conductor = ($_POST['id_conductor']);
        $documento_conductor = ($_POST['documento_conductor']);
        $nombres_conductor = ($_POST['nombres_conductor']);
        $apellidos_conductor = ($_POST['apellidos_conductor']);
        $direccion_conductor = ($_POST['direccion_conductor']);
        $celular_conductor = ($_POST['celular_conductor']);
        $email = ($_POST['email']);
        $vigencia_licencia = ($_POST['vigencia_licencia']);
        $id_categoria = ($_POST['id_categoria']);
        
               
                $sql="UPDATE conductores SET  documento_conductor='$documento_conductor',
                                              nombres_conductor='$nombres_conductor',
                                              apellidos_conductor='$apellidos_conductor',
                                              direccion_conductor='$direccion_conductor',
                                              celular_conductor='$celular_conductor',
                                              email='$email',
                                              vigencia_licencia='$vigencia_licencia',
                                              id_categoria='$id_categoria'

                      WHERE id_conductor='$id_conductor'";
                                      

                $insertar=mysql_query($sql) or die(mysql_error());

                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h2>Se han Actualizado Sus Datos</h2>";
                echo "<meta http-equiv='Refresh' content='3;url=datos_conductor.php'>";
                echo "</center>";
             
    }
    else
 {
    echo "<center>";
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />";
    echo "<h3>Faltan datos del formulario</h3>";
    echo "<meta http-equiv='Refresh' content='3;url=datos_conductor.php'>"; 
    echo "</center>";
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />";

 }
      



?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
