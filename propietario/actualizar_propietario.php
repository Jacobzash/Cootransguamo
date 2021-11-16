<?php
session_start();
include("conexion.php");

if(isset($_SESSION['usuario']))
  {
   $temp=$_SESSION['usuario'];
        if ($temp[0]==3) {
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
    

    include("conexion.php");


    $id_propietario= $temp[0];

  
    $seleccion="SELECT * FROM propietarios,estado
                WHERE propietarios.id_estado=estado.id_estado 
                AND propietarios.id_propietario = '$id_propietario'";
    $resul=mysql_query($seleccion,$con);
    if ($R=mysql_fetch_array($resul))
    { 
  ?> 

      <br />
      <center>
      <form action="" method="post">
        <table style="width: 30%" class="table table-hover table-condensed">
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="2" align="center">
              <h2>Propietario</h2>
            </td>
          </tr>
          <tr>
            <td colspan="2"><input type="hidden" name="id_propietario" value="<?= $R['id_propietario'] ?>"/></td>
          </tr>
          <tr>
            <td style="width: 15%">Documento </td>
            <td style="width: 15%">
              <input class="form-control" type="number" name="documento_propietario" value="<?= $R['documento_propietario'] ?>" style="height: 30px" required autofocus />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Nombres </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="nombres_propietario" value="<?= $R['nombres_propietario'] ?>" style="height: 30px" required  />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Apellidos </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="apellidos_propietario" value="<?= $R['apellidos_propietario'] ?>" style="height: 30px" required />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Dirección </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="direccion_propietario" value="<?= $R['direccion_propietario'] ?>" style="height: 30px" required />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Celular </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="celular_propietario" value="<?= $R['celular_propietario'] ?>" style="height: 30px" required />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">E-Mail </td>
            <td style="width: 15%">
              <input class="form-control" type="email" name="email" value="<?= $R['email'] ?>" style="height: 30px" required />
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
}
else
{
  include("conexion.php");    
            
    if(isset($_POST['documento_propietario']) && !empty($_POST['documento_propietario']) && 
       isset($_POST['nombres_propietario']) && !empty($_POST['nombres_propietario']) &&
       isset($_POST['apellidos_propietario']) && !empty($_POST['apellidos_propietario']) && 
       isset($_POST['direccion_propietario']) && !empty($_POST['direccion_propietario']) && 
       isset($_POST['celular_propietario']) && !empty($_POST['celular_propietario']) &&
       isset($_POST['email']) && !empty($_POST['email']) &&
       isset($_POST['id_propietario']) && !empty($_POST['id_propietario']))
    {
        $documento_propietario = ($_POST['documento_propietario']);
        $nombres_propietario = ($_POST['nombres_propietario']);
        $apellidos_propietario = ($_POST['apellidos_propietario']);
        $direccion_propietario = ($_POST['direccion_propietario']);
        $celular_propietario = ($_POST['celular_propietario']);
        $email = ($_POST['email']);
        $id_propietario = ($_POST['id_propietario']);
        


        $seleccion="SELECT * FROM propietarios WHERE documento_propietario='$documento_propietario'";
        $resul=mysql_query($seleccion)or die(mysql_error());
        $R=mysql_fetch_array($resul);
        

             if($documento_propietario==$R['documento_propietario']) 
             {
               
                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h3>El Propietario ya se encuentra Registrado</h3>";
                echo "<meta http-equiv='Refresh' content='3;url=agregar_propietario.php'>";
                echo "</center>";

             }
             else
             {
               
                $sql="UPDATE propietarios SET documento_propietario='$documento_propietario',
                                              nombres_propietario='$nombres_propietario',
                                              apellidos_propietario='$apellidos_propietario',
                                              direccion_propietario='$direccion_propietario',
                                              celular_propietario='$celular_propietario',
                                              email='$email'

                      WHERE id_propietario='$id_propietario'";
                                      

                $insertar=mysql_query($sql) or die(mysql_error());

                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h2>El Propietario se ha Actualizado Satisfactoriamente</h2>";
                echo "<meta http-equiv='Refresh' content='3;url=actualizar_propietario.php'>";
                echo "</center>";
             }


        


    }
      else
        {
      
              echo "<center><br /><br /><br /><br /><br /><br />";
              echo "<h2>Faltan datos del formulario</h2>";
              echo "<meta http-equiv='Refresh' content='3;url=actualizar_propietario.php'>";
              echo "</center>";
        }

}

?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
