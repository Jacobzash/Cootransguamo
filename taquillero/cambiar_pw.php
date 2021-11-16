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
  if (!isset($_POST['datos'])) 
   {  
        
  ?> 
 
      <br />
      <center>
      <form action="" method="post">
        <table style="width: 50%" class="table table-hover table-condensed">
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="2" align="center"><h2>Cambiar Constraseña</h2></td>
          </tr>
          <tr>
            <td style="width: 25%">Digite Password Antiguo </td>
            <td style="width: 25%">
              <input class="form-control" type="text" name="password_viejo" style="height: 30px" required autofocus />
            </td>
          </tr>
          <tr>
            <td style="width: 25%">Digite Password Nuevo </td>
            <td style="width: 25%">
              <input class="form-control" type="text" name="password_nuevo" style="height: 30px" required />
            </td>
          </tr>
          <tr>
            <td align="center" colspan="2">
              <button type="submit" name="datos" class="btn btn-success btn-xs">Cambiar</button>
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
            
    if(isset($_POST['password_viejo']) && !empty($_POST['password_viejo']) && 
       isset($_POST['password_nuevo']) && !empty($_POST['password_nuevo']))  
    {
        $password_viejo = ($_POST['password_viejo']);
        $password_nuevo = ($_POST['password_nuevo']);

        $temp=$_SESSION['usuario']; 
        $id_taquillero = $temp[0];

        $seleccion="SELECT * FROM taquilleros WHERE id_taquillero='$id_taquillero'";
        $resul=mysql_query($seleccion)or die(mysql_error());
        $R=mysql_fetch_array($resul);
        
         

             if($password_viejo==$R['password']) 
             {
               if ($password_nuevo!=$password_viejo) 
                {
                  $sql="UPDATE taquilleros SET password='$password_nuevo' WHERE id_taquillero='$id_taquillero'";
                  $reg=mysql_query($sql)or die(mysql_error());

                  echo "<center><br /><br /><br /><br /><br /><br />";
                  echo "<h2>El Password Fue Actualizado Con Exito</h2>";
                  echo "<meta http-equiv='Refresh' content='3;url=cambiar_pw.php'>";
                  echo "</center>";
                }
                else
                 {
                  echo "<center><br /><br /><br /><br /><br /><br />";
                  echo "<h3>El Password nuevo es igual al Password antiguo</h3>";
                  echo "<meta http-equiv='Refresh' content='3;url=cambiar_pw.php'>";
                  echo "</center>";
                 }

             }
             else
             {
              echo "<center><br /><br /><br /><br /><br /><br />";
              echo "<h3>El Password Antiguo no es el Correcto</h3>";
              echo "<meta http-equiv='Refresh' content='3;url=cambiar_pw.php'>";
              echo "</center>";
             }


        


    }
      else
        {
      
              echo "<center>";
              echo "<h2>Faltan datos del formulario</h2>";
              echo "<meta http-equiv='Refresh' content='3;url=cambiar_pw.php'>";
              echo "</center>";
        }



}

?>
			

<!-- fin del segundo contenedor -->


  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
