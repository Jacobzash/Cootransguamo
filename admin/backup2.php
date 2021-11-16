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
<div class="container-fluid">
  
  <div class="row">

<?php
  if (!isset($_POST['datos'])) 
   {  
        
  ?> 
    <center>
    <br /><br /><br />
    

    <center>   
      <form action="" method="post">
        <table style="width: 60%"  class="table table-condensed table-hover">
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="2" align="center"><h2>Realizar Copia de Seguridad</h2></td>
          </tr>
          <tr>
          	<td align="center">Realizar una copia de seguridad de la base de datos
          </tr>
          <tr>
            <td colspan="2" align="center"><button type="submit" name="datos" class="btn btn-success btn-sm">Generar</button></td>
          </tr>
        </table>
      </form>
    </center> 
           <br /><br />


<?php 
include("conexion.php");
}
else
{
date_default_timezone_set("America/Bogota");
$fechaDeLaCopia = "-".date("Y-m-d");     
$ficheroDeLaCopia =$db.$fechaDeLaCopia.".sql"; 
$sistema="show variables where variable_name= 'basedir'"; 
$restore=mysql_query($sistema); 
$DirBase=mysql_result($restore,0,"value"); 
$primero=substr($DirBase,0,1); 
//if ($primero=="/") { 							
//    $DirBase="mysqldump"; 
//}  
//else  
//{ 
   //$DirBase=$DirBase."bin\mysqldump"; 
	$DirBase="/Applications/XAMPP/bin/mysqldump";
      
//} 

$executa="$DirBase --host=$host --user=$user --password=$pw -R -c  --add-drop-table $db > $ficheroDeLaCopia"; 
system($executa); 

header( "Content-Disposition: attachment; filename=".$ficheroDeLaCopia.""); 
header("Content-type: application/force-download"); 
@readfile($ficheroDeLaCopia); 

//unlink($ficheroDeLaCopia); 

}


?>
	</div>      

</div>
    

</body>
</html>