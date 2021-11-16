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
        <table style="width: 30%" class="table table-hover table-condensed">
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="2" align="center">
              <h2>Nuevo Administrador</h2>
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Documento </td>
            <td style="width: 15%">
              <input class="form-control" type="number" name="documento_usuario" style="height: 30px" required autofocus />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Nombres </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="nombres_usuario" style="height: 30px" required  />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Apellidos </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="apellidos_usuario" style="height: 30px" required />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Dirección </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="direccion_usuario" style="height: 30px" required />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Celular </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="celular_usuario" style="height: 30px" required />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">E-Mail </td>
            <td style="width: 15%">
              <input class="form-control" type="email" name="email" style="height: 30px" required />
            </td>
          </tr>
          <tr>
            <td style="width: 15%">Password </td>
            <td style="width: 15%">
              <input class="form-control" type="text" name="password" style="height: 30px" required />
            </td>
          </tr>
          <tr>
            <td align="center" colspan="2">
              <button type="submit" name="datos" class="btn btn-success btn-xs">Agregar</button>
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
            
    if(isset($_POST['documento_usuario']) && !empty($_POST['documento_usuario']) && 
       isset($_POST['nombres_usuario']) && !empty($_POST['nombres_usuario']) &&
       isset($_POST['apellidos_usuario']) && !empty($_POST['apellidos_usuario']) && 
       isset($_POST['direccion_usuario']) && !empty($_POST['direccion_usuario']) && 
       isset($_POST['celular_usuario']) && !empty($_POST['celular_usuario']) &&
       isset($_POST['email']) && !empty($_POST['email']) &&
       isset($_POST['password']) && !empty($_POST['password']))
    {
        $documento_usuario = ($_POST['documento_usuario']);
        $nombres_usuario = ($_POST['nombres_usuario']);
        $apellidos_usuario = ($_POST['apellidos_usuario']);
        $direccion_usuario = ($_POST['direccion_usuario']);
        $celular_usuario = ($_POST['celular_usuario']);
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        $id_estado = 1;
        $id_tipo_usuario = 1;


        $seleccion="SELECT * FROM Usuarios WHERE documento_usuario='$documento_usuario'";
        $resul=mysql_query($seleccion)or die(mysql_error());
        $R=mysql_fetch_array($resul);
        

             if($documento_usuario==$R['documento_usuario']) 
             {
               
                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h3>El Administrador ya se encuentra Registrado</h3>";
                echo "<meta http-equiv='Refresh' content='3;url=agregar_admin.php'>";
                echo "</center>";

             }
             else
             {
               
                $sql="INSERT INTO Usuarios (documento_usuario,
                                            nombres_usuario,
                                            apellidos_usuario,
                                            direccion_usuario,
                                            celular_usuario,
                                            email,
                                            password,
                                            id_estado,
                                            id_tipo_usuario)
                              VALUES ('$documento_usuario',
                                      '$nombres_usuario',
                                      '$apellidos_usuario',
                                      '$direccion_usuario',
                                      '$celular_usuario',
                                      '$email',
                                      '$password',
                                      '$id_estado',
                                      '$id_tipo_usuario')";

                $insertar=mysql_query($sql) or die(mysql_error());

                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h2>El Administrador se ha Registrado Satidfactoriamente</h2>";
                echo "<meta http-equiv='Refresh' content='3;url=agregar_admin.php'>";
                echo "</center>";
             }


        


    }
      else
        {
      
              echo "<center><br /><br /><br /><br /><br /><br />";
              echo "<h2>Faltan datos del formulario</h2>";
              echo "<meta http-equiv='Refresh' content='3;url=agregar_admin.php'>";
              echo "</center>";
        }

}

?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
