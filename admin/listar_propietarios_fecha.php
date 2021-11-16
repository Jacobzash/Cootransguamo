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
        <h2>Listado de Propietarios Por Fecha</h2>
        <table style="width: 40%"  class="table table-condensed table-hover">
          <tr>
            <td colspan="2" align="center" style="background-color: #f0b650; color: #fff">
              <h3>Seleccione las fechas</h3></td>
          </tr>
          <tr>
            <td style="width: 20%">
              Fecha Inicial
            </td>
            <td style="width: 20%">
             Fecha Final
          </tr>
          <tr>
            <td style="width: 20%">
              <input class="form-control" type="date" name="pini" required >
            </td>
            <td style="width: 20%">
              <input class="form-control" type="date" name="pfinal" required >
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center"><button type="submit" name="datos" class="btn btn-success btn-sm">Listar</button></td>
          </tr>
        </table>
      </form>

      <div id="resultado" class="text-center">
        
        </div>
    </center> 

<?php
  }
  else
  {

  include("conexion.php");

  $pini = $_POST['pini'];
  $pfinal = $_POST['pfinal'];
        
            $sql = "SELECT * FROM propietarios,estado 
            WHERE propietarios.id_estado=estado.id_estado
            AND fecha_alta >= '$pini' 
            AND fecha_alta <= '$pfinal'";
            
                $registro = mysql_query($sql);

                $resultado = mysql_num_rows($registro); 
                        

              if($resultado > 0) 
              { 
     
 ?>  
    <br />
    <center>
      <br /><br />
               <h2>Listado de Propietarios de <?php echo $pini; ?> a <?php echo $pfinal; ?> </h2>
               <table class="table table-condensed table-hover"  style="width:70%">
                <tr style="background: #f0b650">
                <td align="center" style="width: 10%"><font color="#fff">Documento</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Nombres</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Apellidos</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Dirección</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Teléfono</font></td>
                <td align="center" style="width: 10%"><font color="#fff">E-Mail</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Estado</font></td>
               </tr>
            
  <?php

          while ($reg=mysql_fetch_array($registro)) 
                {
  ?>
                
                <tr>
                <td><?php echo $reg['documento_propietario']; ?></td>
                <td><?php echo $reg['nombres_propietario']; ?></td>
                <td><?php echo $reg['apellidos_propietario']; ?></td>
                <td><?php echo $reg['direccion_propietario']; ?></td>
                <td><?php echo $reg['celular_propietario']; ?></td>
                <td><?php echo $reg['email']; ?></td>
                <td><?php echo $reg['estado']; ?></td>
                </tr>
              
  <?php
  
                }

           echo "</table>"; 
           echo "</center>";

           echo "<center>";
           echo "<button class='btn btn-success btn-sm' value='Imprimir' onclick='window.print()'><i class='fa fa-print'></i>&nbsp;Imprimir</button>";
           echo "</center>";

          }
           else
           {
             echo "<center><br /><br /><br /><br /><br /><br />";
             echo "<h2>No Existen Propietarios </h2>";
             echo "</center>";
           }

       
  }
  ?>
           

</body>
</html>