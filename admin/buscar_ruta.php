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
        <br /><br />
        <table style="width: 40%"  class="table table-condensed table-hover">
          <tr>
            <td colspan="2" align="center" style="background-color: #f0b650; color: #fff"><h2>Buscar Ruta</h2></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><h3>Seleccione el método de busqueda</h3></td>
          </tr>
          <tr>
            <td style="width: 20%">
              <select name="lista" style="width:300px; height:27px" required >
                <option value="nombre_ruta">Nombre Ruta</option>
                <option value="ciudad_origen">Ciudad Origen</option>
                <option value="ciudad_destino">Ciudad Destino</option>
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



            $sql = "SELECT * FROM rutas,estado WHERE rutas.id_estado=estado.id_estado 
                    AND $lista like '$buscar'";
                $registro = mysql_query($sql)or die(mysql_error());

                $resultado = mysql_num_rows($registro); 
                        

              if($resultado > 0) 
              { 
                 
  ?>

            <center>
            <br /><br />
               <h2>Rutas</h2>
               <table class="table table-condensed table-hover"  style="width:45%">
                <tr style="background: #f0b650">
                <td align="center" style="width: 20%"><font color="#fff">Nombre Ruta</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Ciudad Origen</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Ciudad Destino</font></td>
                <td align="center" style="width: 10%"><font color="#fff">Estado</font></td>
                <td align="center" style="width: 5%"><font color="#fff">Horario</font></td>
               </tr>
  <?php

          while ($reg=mysql_fetch_array($registro)) 
                {
                  $id_rutas = $reg['id_rutas'];
  ?>
                
                <tr>
                <td><?php echo $reg['nombre_ruta']; ?></td>
                <td><?php echo $reg['ciudad_origen']; ?></td>
                <td><?php echo $reg['ciudad_destino']; ?></td>
                <td><?php echo $reg['estado']; ?></td>
                <td><a href="" data-toggle="modal" data-target="#horarios">Ver horario</a></td>
                </tr>
              
  <?php
  
              }

          }
           else
           {
             echo "<center><br /><br /><br /><br /><br /><br />";
             echo "<h2>La Ruta no se encuentra </h2>";
             echo "<meta http-equiv='Refresh' content='3;url=buscar_ruta.php'>";
             echo "</center>";
           }

       }
      else
      {
        
        echo "<center><br /><br /><br /><br /><br /><br />";
        echo "<h2>No ha llenado la caja de texto</h2>";
        echo "<meta http-equiv='Refresh' content='3;url=buscar_ruta.php'>";
        echo "</center>";
      }
  }
    
  ?>
           </table> 
          </center>

<script src="../js/bootstrap.js"></script>
             
<!-- novena ventana modal -->
<div class="modal fade" id="horarios" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">  

          <table style="width:100%" class="table table-condensed table-hover">
            <tr>
              <td align="center"><b>Hora de salida</b></td>
            </tr>
              <?php
              include("conexion.php");

              $id_rutas;
              $sql="SELECT * FROM detalle_rutas WHERE id_rutas='$id_rutas'";
              $res=mysql_query($sql)or die(mysql_error());
              while ( $tabla=mysql_fetch_array($res)) 
              {

              ?>
              <tr>
                 <td align="center"><?php echo $tabla['horario']; ?></td>
              </tr>
              <?php
               
               }

              ?>
            
          </table>
            <p class="text-center">
            <button type="button" class="btn btn-success btn-xs" data-dismiss="modal">Cerrar</button>
            </p>
         
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- fin novena ventana modal -->


</body>
</html>