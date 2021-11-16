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

		<br /><br />
		<center>
        <table style="width: 60%"  class="table table-condensed table-hover">
            <tr>
              <td style="background-color: #f0b650; color: #fff" colspan="2" align="center"><h2>Restaurar Copia de Seguridad</h2> </td>
            </tr>
            <tr>
              <td align="center"><h5><b>-*IMPORTANTE*-</b> <br />El archivo a restaurar debe tener extención (.sql) <br />
                  La estructura del archivo debe quedar: <b><? echo $db; ?>.sql</b> </h5></td>
            </tr>
        </table>
    <center>
<?
include ("conexion.php"); 
echo'<title>Restore & backup </title>'; 
if (!isset ($_FILES["ficheroDeCopia"])) 
{ 

?>
  <form class="form-horizontal" action="restore.php" method="post" enctype="multipart/form-data" name="formularioDeRestauracion" id="formularioDeRestauracion">

  <center>
    <table class="table table-condensed" style="width:50%"" border="0" align="center"  cellspacing="7"> 
      <tr class="info"> 
        <td style="background-color: #f0b650; color: #fff" colspan="4" align="center">Indique el origen del archivo de copia: </td> 
      </tr>
      <tr>
        <td colspan="2" align="center"><input class="form-control file" type="file" name="ficheroDeCopia" id="ficheroDeCopia" size="30"></td>
      </tr>
      <tr>
        <td colspan="3" align="center"><input name="envio" class="btn btn-success btn-sm" type="submit" id="envio" value="&nbsp; Aceptar ">&nbsp;<input name="borrar" class="btn btn-success btn-sm" type="reset" id="borrar" value=" Cancelar "></td>
      </tr>  
    </table> 
  </center>
  </form>

<?php 
//echo ($contenidoDeFormulario); 
} 
else  
{ 
    


    $archivoRecibido=$_FILES["ficheroDeCopia"]["tmp_name"]; 
    $destino="./ficheroParaRestaurar.sql"; 
         
    if (!move_uploaded_file ($archivoRecibido, $destino)) 
    { 
      $mensaje='EL proceso ha fallado, el archivo no es .sql'; 
      echo $mensaje; 
    }

    $sistema="show variables where variable_name= 'basedir'"; 
    $restore=mysql_query($sistema); 
    $DirBase=mysql_result($restore,0,"value"); 
    $primero=substr($DirBase,0,1); 

      if ($primero=="/") 
      { 
          $DirBase="bin/mysql"; 
      }  
      else  
      { 
          $DirBase=$DirBase."bin\mysql"; 
      }
         
        $executa = "$DirBase -h $host -u $user --password=$pw  $db < $destino"; 
        system($executa,$resultado); 
        
        if (!$resultado)  
        {  
          //echo "<H3>Error ejecutando comando: $executa</H3>\n"; 
          $mensaje2="ERROR. La copia de seguridad no se ha restaurado.<br /><br /><br /><br /><br /><br /><br />"; 
          $cabecera="COPIA DE SEGURIDAD NO RESTAURADA"; 
          echo $mensaje2; 
          //echo "<meta http-equiv='Refresh' content='5;url=restore.php'>"; 
        }  
        else  
        { 
            $mensaje3="La copia de seguridad se ha restaurado correctamente. <br /><br /><br /><br /><br /><br /><br />";  
            $cabecera2="COPIA DE SEGURIDAD RESTAURADA"; 
            echo "<br />";
            echo $mensaje3; 
            //echo "<meta http-equiv='Refresh' content='5;url=restore.php'>"; 
            echo "<br />";
        } 

       // unlink ("ficheroParaRestaurar.sql"); 
     
} 

?>
  

</body>
</html>