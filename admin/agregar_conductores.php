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
<script>

//función para el tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

</script>
<body>
<?php
  if (!isset($_POST['datos'])) 
   {  
        
  ?> 

      <br />
      <center>
      <form action="" method="post">
        <table style="width: 30%" class="table table-hover table-condensed" >
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="2" align="center" >
              <h2>Nuevo Conductor</h2>
            </td>
          </tr>
          <tr>
            <td>Documento </td>
            <td align="right">
              <input class="form-control" type="number" name="documento_conductor" style="width: 200px; height: 27px" required autofocus />
            </td>
          </tr>
          <tr>
            <td>Nombres </td>
            <td align="right">
              <input class="form-control" type="text" name="nombres_conductor" style="width: 200px; height: 27px" required  />
            </td>
          </tr>
          <tr>
            <td>Apellidos </td>
            <td align="right">
              <input class="form-control" type="text" name="apellidos_conductor" style="width: 200px; height: 27px" required />
            </td>
          </tr>
          <tr>
            <td>Dirección </td>
            <td align="right">
              <input class="form-control" type="text" name="direccion_conductor" style="width: 200px; height: 27px" required />
            </td>
          </tr>
          <tr>
            <td>Celular </td>
            <td align="right">
              <input class="form-control" type="number" name="celular_conductor" style="width: 200px; height: 27px" required />
            </td>
          </tr>
          <tr>
            <td>E-Mail </td>
            <td align="right">
              <input class="form-control" type="email" name="email" style="width: 200px; height: 27px" required />
            </td>
          </tr>
          <tr>
            <td>Password </td>
            <td align="right">
              <input class="form-control" type="text" name="password" style="width: 200px; height: 27px" required />
            </td>
          </tr>
          <tr>
            <td>Número Licencia </td>
            <td align="right">
              <input class="form-control" type="text" name="licencia_conductor" style="width: 200px; height: 27px" required />
            </td>
          </tr>
          <tr>
            <td>Vigencia Licencia </td>
            <td align="right">
              <input class="form-control" type="date" name="vigencia_licencia" style="width: 200px; height: 27px" required />
            </td>
          </tr>
          <tr>
            <td>Categoría Licencia </td>
            <td align="right">
              <select  name="id_categoria" style="width: 200px; height:27px"  required >
                  <option value=""> Seleccione la categoria        </option>
                  <?php
                    include("conexion.php");

                     $sql="SELECT * FROM categorias";
                     $consulta=mysql_query($sql);
                     while ($reg=mysql_fetch_array($consulta)) 
                     {
                        echo '<option value="'.$reg['id_categoria'].'">'.$reg['categoria'].'&nbsp;'.$reg['descripcion'].'</option>';
                     }
                   ?>
              </select>
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
            
    if(isset($_POST['documento_conductor']) && !empty($_POST['documento_conductor']) && 
       isset($_POST['nombres_conductor']) && !empty($_POST['nombres_conductor']) &&
       isset($_POST['apellidos_conductor']) && !empty($_POST['apellidos_conductor']) && 
       isset($_POST['direccion_conductor']) && !empty($_POST['direccion_conductor']) && 
       isset($_POST['celular_conductor']) && !empty($_POST['celular_conductor']) &&
       isset($_POST['email']) && !empty($_POST['email']) &&
       isset($_POST['password']) && !empty($_POST['password']) &&
       isset($_POST['licencia_conductor']) && !empty($_POST['licencia_conductor']) &&
       isset($_POST['vigencia_licencia']) && !empty($_POST['vigencia_licencia']) &&
       isset($_POST['id_categoria']) && !empty($_POST['id_categoria']))
    {
        $documento_conductor = ($_POST['documento_conductor']);
        $nombres_conductor = ($_POST['nombres_conductor']);
        $apellidos_conductor = ($_POST['apellidos_conductor']);
        $direccion_conductor = ($_POST['direccion_conductor']);
        $celular_conductor = ($_POST['celular_conductor']);
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        $licencia_conductor = ($_POST['licencia_conductor']);
        $vigencia_licencia = ($_POST['vigencia_licencia']);
        $id_categoria = ($_POST['id_categoria']);
        $id_estado = 1;
        $id_tipo_usuario = 2;

        date_default_timezone_set("America/Bogota");
        $fecha_alta = date("Y-m-d");



        $seleccion="SELECT * FROM conductores WHERE documento_conductor='$documento_conductor'";
        $resul=mysql_query($seleccion)or die(mysql_error());
        $R=mysql_fetch_array($resul);
        

             if($documento_conductor==$R['documento_conductor']) 
             {
               
                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h3>El Conductor ya se encuentra Registrado</h3>";
                echo "<meta http-equiv='Refresh' content='3;url=agregar_conductores.php'>";
                echo "</center>";

             }
             else
             {
               
                $sql="INSERT INTO conductores (documento_conductor,
                                                nombres_conductor,
                                                apellidos_conductor,
                                                direccion_conductor,
                                                celular_conductor,
                                                email,
                                                password,
                                                licencia_conductor,
                                                vigencia_licencia,
                                                id_categoria,
                                                id_estado,
                                                id_tipo_usuario,
                                                fecha_alta)
                              VALUES ('$documento_conductor',
                                      '$nombres_conductor',
                                      '$apellidos_conductor',
                                      '$direccion_conductor',
                                      '$celular_conductor',
                                      '$email',
                                      '$password',
                                      '$licencia_conductor',
                                      '$vigencia_licencia',
                                      '$id_categoria',
                                      '$id_estado',
                                      '$id_tipo_usuario',
                                      '$fecha_alta')";

                $insertar=mysql_query($sql) or die(mysql_error());

                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h2>El Conductor se ha Registrado Satisfactoriamente</h2>";
                echo "<meta http-equiv='Refresh' content='3;url=agregar_conductores.php'>";
                echo "</center>";
             }


        


    }
      else
        {
      
              echo "<center><br /><br /><br /><br /><br /><br />";
              echo "<h2>Faltan datos del formulario</h2>";
              echo "<meta http-equiv='Refresh' content='3;url=agregar_conductores.php'>";
              echo "</center>";
        }

}

?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
