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
        <h2>Busqueda de Conductor</h2>
        <table style="width: 40%"  class="table table-condensed table-hover">
          <tr>
            <td colspan="2" align="center" style="background-color: #f0b650; color: #fff">
              <h3>Seleccione el método de busqueda</h3></td>
          </tr>
          <tr>
            <td style="width: 20%">
              <select name="lista" style="width:300px; height:27px" required >
                <option value="documento_conductor">Documento</option>
                <option value="nombres_conductor">Nombres</option>
                <option value="apellidos_conductor">Apellidos</option>
              </select>
            </td>
            <td style="width: 20%"><input class="form-control" type="text" name="buscar" style="width:300px; height:27px" required /></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><button type="submit" name="datos" class="btn btn-success btn-sm">Buscar</button></td>
          </tr>
        </table>
      </form>
    </center> 
           <br /><br />
            
  
    
<?php
}
else
{
          include("conexion.php");

          if(isset($_POST['lista']) && !empty($_POST['lista']) &&
             isset($_POST['buscar']) && !empty($_POST['buscar']))
          {

            $lista = $_POST['lista'];
            $buscar = $_POST['buscar'];
            


            $sql = "SELECT * FROM conductores,estado,categorias WHERE conductores.id_estado=estado.id_estado 
                    AND conductores.id_categoria=categorias.id_categoria
                    AND $lista like '$buscar'";
                $registro = mysql_query($sql);

                $resultado = mysql_num_rows($registro); 
                        

              if($resultado > 0) 
              { 
               while ($reg=mysql_fetch_array($registro)) 
                {
                 
  ?>

            <center>
            <br /><br />
               <h2>Conductor</h2>
               <table class="table table-condensed table-bordered table-hover"  style="width:70%">
                <tr style="background: #f0b650">
                <td align="center" style="width: 10%"><font color="#fff">Documento</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Nombres</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Apellidos</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Dirección</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Celular</font></td>
                </tr>
                <tr>
                <td><?php echo $reg['documento_conductor']; ?></td>
                <td><?php echo $reg['nombres_conductor']; ?></td>
                <td><?php echo $reg['apellidos_conductor']; ?></td>
                <td><?php echo $reg['direccion_conductor']; ?></td>
                <td><?php echo $reg['celular_conductor']; ?></td>
                </tr>
                <tr style="background: #f0b650">
                <td align="center" style="width: 10%"><font color="#fff">E-Mail</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Licencia</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Vigencia Licencia</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Categoría</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Estado</font></td>
               </tr>
               <tr>
                <td><?php echo $reg['email']; ?></td>
                <td><?php echo $reg['licencia_conductor']; ?></td>
                <td><?php echo $reg['vigencia_licencia']; ?></td>
                <td><?php echo $reg['categoria']; ?></td>
                <td><?php echo $reg['estado']; ?></td>
                </tr>
                     
  <?php
  
              }

          }
           else
           {
             echo "<center><br /><br /><br /><br /><br /><br />";
             echo "<h2>El Conductor no se encuentra </h2>";
             echo "<meta http-equiv='Refresh' content='3;url=buscar_conductor.php'>";
             echo "</center>";
           }

       }
      else
      {
        
        echo "<center><br /><br /><br /><br /><br /><br />";
        echo "<h2>No ha llenado la caja de texto</h2>";
        echo "<meta http-equiv='Refresh' content='3;url=buscar_conductor.php'>";
        echo "</center>";
      }
  }
    
  ?>
           </table> 
          </center>
             



</body>
</html>