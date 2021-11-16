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
  <script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
      $("#add").click(function(){
        var tds=$("#tabla tr:first td").length;
        var trs=$("#tabla tr").length;
        var nuevaFila="<tr>";
          cant = $('#contador-filas').val();
          cant++;
          $('#contador-filas').val(cant)
          nuevaFila+="<td>Horario </td>"+
                     "<td><select class='form-control' name='horario["+(cant)+"]' style='height: 27px' required >"+ 
                          "<option value=''>------------</option>"+
                          "<option value='00:00:00'> 00:00:00 </option>"+
                          "<option value='00:10:00'> 00:10:00 </option>"+
                          "<option value='00:20:00'> 00:20:00 </option>"+
                          "<option value='00:30:00'> 00:30:00 </option>"+
                          "<option value='00:40:00'> 00:40:00 </option>"+
                          "<option value='00:50:00'> 00:50:00 </option>"+
                          "<option value='01:00:00'> 01:00:00 </option>"+
                          "<option value='01:10:00'> 01:10:00 </option>"+
                          "<option value='01:20:00'> 01:20:00 </option>"+
                          "<option value='01:30:00'> 01:30:00 </option>"+
                          "<option value='01:40:00'> 01:40:00 </option>"+
                          "<option value='01:50:00'> 01:50:00 </option>"+
                          "<option value='02:00:00'> 02:00:00 </option>"+
                          "<option value='02:10:00'> 02:10:00 </option>"+
                          "<option value='02:20:00'> 02:20:00 </option>"+
                          "<option value='02:30:00'> 02:30:00 </option>"+
                          "<option value='02:40:00'> 02:40:00 </option>"+
                          "<option value='02:50:00'> 02:50:00 </option>"+
                          "<option value='03:00:00'> 03:00:00 </option>"+
                          "<option value='03:10:00'> 03:10:00 </option>"+
                          "<option value='03:20:00'> 03:20:00 </option>"+
                          "<option value='03:30:00'> 03:30:00 </option>"+
                          "<option value='03:40:00'> 03:40:00 </option>"+
                          "<option value='03:50:00'> 03:50:00 </option>"+
                          "<option value='04:00:00'> 04:00:00 </option>"+
                          "<option value='04:10:00'> 04:10:00 </option>"+
                          "<option value='04:20:00'> 04:20:00 </option>"+
                          "<option value='04:30:00'> 04:30:00 </option>"+
                          "<option value='04:40:00'> 04:40:00 </option>"+
                          "<option value='04:50:00'> 04:50:00 </option>"+
                          "<option value='05:00:00'> 05:00:00 </option>"+
                          "<option value='05:10:00'> 05:10:00 </option>"+
                          "<option value='05:20:00'> 05:20:00 </option>"+
                          "<option value='05:30:00'> 05:30:00 </option>"+
                          "<option value='05:40:00'> 05:40:00 </option>"+
                          "<option value='05:50:00'> 05:50:00 </option>"+
                          "<option value='06:00:00'> 06:00:00 </option>"+
                          "<option value='06:10:00'> 06:10:00 </option>"+
                          "<option value='06:20:00'> 06:20:00 </option>"+
                          "<option value='06:30:00'> 06:30:00 </option>"+
                          "<option value='06:40:00'> 06:40:00 </option>"+
                          "<option value='06:50:00'> 06:50:00 </option>"+
                          "<option value='07:00:00'> 07:00:00 </option>"+
                          "<option value='07:10:00'> 07:10:00 </option>"+
                          "<option value='07:20:00'> 07:20:00 </option>"+
                          "<option value='07:30:00'> 07:30:00 </option>"+
                          "<option value='07:40:00'> 07:40:00 </option>"+
                          "<option value='07:50:00'> 07:50:00 </option>"+
                          "<option value='08:00:00'> 08:00:00 </option>"+
                          "<option value='08:10:00'> 08:10:00 </option>"+
                          "<option value='08:20:00'> 08:20:00 </option>"+
                          "<option value='08:30:00'> 08:30:00 </option>"+
                          "<option value='08:40:00'> 08:40:00 </option>"+
                          "<option value='08:50:00'> 08:50:00 </option>"+
                          "<option value='09:00:00'> 09:00:00 </option>"+
                          "<option value='09:10:00'> 09:10:00 </option>"+
                          "<option value='09:20:00'> 09:20:00 </option>"+
                          "<option value='09:30:00'> 09:30:00 </option>"+
                          "<option value='09:40:00'> 09:40:00 </option>"+
                          "<option value='09:50:00'> 09:50:00 </option>"+
                          "<option value='10:00:00'> 10:00:00 </option>"+
                          "<option value='10:10:00'> 10:10:00 </option>"+
                          "<option value='10:20:00'> 10:20:00 </option>"+
                          "<option value='10:30:00'> 10:30:00 </option>"+
                          "<option value='10:40:00'> 10:40:00 </option>"+
                          "<option value='10:50:00'> 10:50:00 </option>"+
                          "<option value='11:00:00'> 11:00:00 </option>"+
                          "<option value='11:10:00'> 11:10:00 </option>"+
                          "<option value='11:20:00'> 11:20:00 </option>"+
                          "<option value='11:30:00'> 11:30:00 </option>"+
                          "<option value='11:40:00'> 11:40:00 </option>"+
                          "<option value='11:50:00'> 11:50:00 </option>"+
                          "<option value='12:00:00'> 12:00:00 </option>"+
                          "<option value='12:10:00'> 12:10:00 </option>"+
                          "<option value='12:20:00'> 12:20:00 </option>"+
                          "<option value='12:30:00'> 12:30:00 </option>"+
                          "<option value='12:40:00'> 12:40:00 </option>"+
                          "<option value='12:50:00'> 12:50:00 </option>"+
                          "<option value='13:00:00'> 13:00:00 </option>"+
                          "<option value='13:10:00'> 13:10:00 </option>"+
                          "<option value='13:20:00'> 13:20:00 </option>"+
                          "<option value='13:30:00'> 13:30:00 </option>"+
                          "<option value='13:40:00'> 13:40:00 </option>"+
                          "<option value='13:50:00'> 13:50:00 </option>"+
                          "<option value='14:00:00'> 14:00:00 </option>"+
                          "<option value='14:10:00'> 14:10:00 </option>"+
                          "<option value='14:20:00'> 14:20:00 </option>"+
                          "<option value='14:30:00'> 14:30:00 </option>"+
                          "<option value='14:40:00'> 14:40:00 </option>"+
                          "<option value='14:50:00'> 14:50:00 </option>"+
                          "<option value='15:00:00'> 15:00:00 </option>"+
                          "<option value='15:10:00'> 15:10:00 </option>"+
                          "<option value='15:20:00'> 15:20:00 </option>"+
                          "<option value='15:30:00'> 15:30:00 </option>"+
                          "<option value='15:40:00'> 15:40:00 </option>"+
                          "<option value='15:50:00'> 15:50:00 </option>"+
                          "<option value='16:00:00'> 16:00:00 </option>"+
                          "<option value='16:10:00'> 16:10:00 </option>"+
                          "<option value='16:20:00'> 16:20:00 </option>"+
                          "<option value='16:30:00'> 16:30:00 </option>"+
                          "<option value='16:40:00'> 16:40:00 </option>"+
                          "<option value='16:50:00'> 16:50:00 </option>"+
                          "<option value='17:00:00'> 17:00:00 </option>"+
                          "<option value='17:10:00'> 17:10:00 </option>"+
                          "<option value='17:20:00'> 17:20:00 </option>"+
                          "<option value='17:30:00'> 17:30:00 </option>"+
                          "<option value='17:40:00'> 17:40:00 </option>"+
                          "<option value='17:50:00'> 17:50:00 </option>"+
                          "<option value='18:00:00'> 18:00:00 </option>"+
                          "<option value='18:10:00'> 18:10:00 </option>"+
                          "<option value='18:20:00'> 18:20:00 </option>"+
                          "<option value='18:30:00'> 18:30:00 </option>"+
                          "<option value='18:40:00'> 18:40:00 </option>"+
                          "<option value='18:50:00'> 18:50:00 </option>"+
                          "<option value='19:00:00'> 19:00:00 </option>"+
                          "<option value='19:10:00'> 19:10:00 </option>"+
                          "<option value='19:20:00'> 19:20:00 </option>"+
                          "<option value='19:30:00'> 19:30:00 </option>"+
                          "<option value='19:40:00'> 19:40:00 </option>"+
                          "<option value='19:50:00'> 19:50:00 </option>"+
                          "<option value='20:00:00'> 20:00:00 </option>"+
                          "<option value='20:10:00'> 20:10:00 </option>"+
                          "<option value='20:20:00'> 20:20:00 </option>"+
                          "<option value='20:30:00'> 20:30:00 </option>"+
                          "<option value='20:40:00'> 20:40:00 </option>"+
                          "<option value='20:50:00'> 20:50:00 </option>"+
                          "<option value='21:00:00'> 21:00:00 </option>"+
                          "<option value='21:10:00'> 21:10:00 </option>"+
                          "<option value='21:20:00'> 21:20:00 </option>"+
                          "<option value='21:30:00'> 21:30:00 </option>"+
                          "<option value='21:40:00'> 21:40:00 </option>"+
                          "<option value='21:50:00'> 21:50:00 </option>"+
                          "<option value='22:00:00'> 22:00:00 </option>"+
                          "<option value='22:10:00'> 22:10:00 </option>"+
                          "<option value='22:20:00'> 22:20:00 </option>"+
                          "<option value='22:30:00'> 22:30:00 </option>"+
                          "<option value='22:40:00'> 22:40:00 </option>"+
                          "<option value='22:50:00'> 22:50:00 </option>"+
                          "<option value='23:00:00'> 23:00:00 </option>"+
                          "<option value='23:10:00'> 23:10:00 </option>"+
                          "<option value='23:20:00'> 23:20:00 </option>"+
                          "<option value='23:30:00'> 23:30:00 </option>"+
                          "<option value='23:40:00'> 23:40:00 </option>"+
                          "<option value='23:50:00'> 23:50:00 </option>"+
                     "</select>"+
                     "</td>";
        
          nuevaFila+="</tr>";
          $("#tabla").append(nuevaFila);
        });
       
        $("#del").click(function(){
            var trs=$("#tabla tr").length;
            if(trs>1)
            {
                cant--;
                $('#contador-filas').val(cant)
                $("#tabla tr:last").remove();

            }
        });
    });
    </script>

</head>
<body>
<?php

    include("conexion.php");


if(isset($_POST['nombre_ruta']) && !empty($_POST['nombre_ruta'])) 
 {

      $nombre_ruta = $_POST['nombre_ruta'];
      

    $seleccion="SELECT * FROM rutas,estado
                WHERE rutas.id_estado=estado.id_estado 
                AND nombre_ruta= '$nombre_ruta'";
    $resul=mysql_query($seleccion)or die(mysql_error());
    if ($R=mysql_fetch_array($resul))
    { 
      
?> 

      <br />
      <center>
      <form action="update_ruta.php" method="post">
        <table style="width: 40%" class="table table-hover table-condensed">
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="2" align="center">
              <h2>Datos de la Ruta</h2>
            </td>
          </tr>
          <tr>
            <td colspan="2"><input type="hidden" name="id_rutas" value="<?= $R['id_rutas'] ?>"/></td>
          </tr>
          <tr>
            <td style="width: 30%">Nombre de la Ruta </td>
            <td style="width: 10%">
              <input class="form-control" type="text" name="nombre_ruta" value="<?= $R['nombre_ruta'] ?>" style="width: 280px; height: 27px"  autofocus />
            </td>
          </tr>
          <tr>
            <td>Ciudad Origen Actual </td>
            <td>
              <label class="form-control" style="width: 280px; height: 27px" ><?php echo $R['ciudad_origen'] ?></label>
            </td>
          </tr>
          <tr>
            <td>Departamento Origen </td>
            <td>
              <select class="form-control" id="combodepartamentos" name="id_departamento" style="width: 280px; height: 27px" required >
                 <option value="">Selecciona Departamento</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Ciudad Origen </td>
            <td>
              <select class="form-control" id="combomunicipios" name="municipio" style="width: 280px; height: 27px" required >
                  <option value="">Selecciona Ciudad</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Ciudad Destino Actual </td>
            <td>
              <label class="form-control" style="width: 280px; height: 27px"><?php echo $R['ciudad_destino'] ?></label>
            </td>
          </tr>
          <tr>
            <td>Departamento Destino </td>
            <td>
              <select class="form-control" id="combodepartamentos2" name="id_departamento2" style="width: 280px; height: 27px" required >
                 <option value="">Selecciona Departamento</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Ciudad Destino </td>
            <td>
              <select class="form-control" id="combomunicipios2" name="municipio2" style="width: 280px; height: 27px" required >
                  <option value="">Selecciona Ciudad</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Estado </td>
            <td>
              <select name="id_estado" style="width: 280px; height:27px" >
               <option value=""> Selecciona el Estado de la Ruta </option>
                        <?php
                        include("conexion.php");

                        $sql="SELECT * FROM estado";
                        $consulta=mysql_query($sql);
                        while ($reg=mysql_fetch_array($consulta)) 
                        {
                          if($reg['id_estado']==$R['id_estado'])
                          {
                          echo '<option value="'.$reg['id_estado'].'" selected>'.$reg['estado'].'</option>';
                          }
                          else
                          {
                          echo '<option value="'.$reg['id_estado'].'">'.$reg['estado'].'</option>';
                          }
                        }
                      ?>
            </select>
            </td>
          </tr>
          <tr>
            <td align="center" colspan="2">
              <button type="submit" name="datos" class="btn btn-success btn-xs">Guardar</button>
            </td>
          </tr>
        </table>
        <br />
        <div>
          |&nbsp;<a href="" data-toggle="modal" data-target="#horarios">Ver horario</a>&nbsp;|
           &nbsp;<a href="" data-toggle="modal" data-target="#agregarhorarios">Agregar horario</a>&nbsp;|
           &nbsp;<a href="" data-toggle="modal" data-target="#quitarhorarios">Eliminar horario</a>&nbsp;|
        </div>
      </form>
    </center>
  
<?php
    
    }
    else
          {
        
                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h2>No se Encuentra la Ruta</h2>";
                echo "<meta http-equiv='Refresh' content='3;url=actualizar_ruta.php'>";
                echo "</center>";
          }

 }
else
{
  
    echo "<center><br /><br /><br /><br /><br /><br />";
    echo "<h2>Faltan Datos del Formulario</h2>";
    echo "<meta http-equiv='Refresh' content='3;url=actualizar_ruta.php'>";
    echo "</center>";
}




?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $.ajax({
        url:'datos.php?Accion=Getdepartamentos',
        success:function(Datos){
          for (x = 0;x<Datos.length;x++)
          {
            //$("#combodepartamentos").append("<option value='"+ Datos[x].id_departamento+"'>"+ Datos[x].departamento+"</option>");
            $("#combodepartamentos").append(new Option(Datos[x].departamento, Datos[x].id_departamento));
          }
        }
      });
      $('#combodepartamentos').change(function(){   //.change
        $('#combomunicipios').empty();
        $.getJSON('datos.php',{Accion:'Getmunicipios', id_departamento:$('#combodepartamentos option:selected').val()}, function(Datos){
          for (x = 0;x<Datos.length;x++)
          {
            
            $("#combomunicipios").append(new Option(Datos[x].municipio, Datos[x].municipio));
          }
        })
      });

    });
      
      
</script> 
<script type="text/javascript">
    $(document).ready(function(){
      $.ajax({
        url:'datos2.php?Accion=Getdepartamentos',
        success:function(Datos){
          for (x = 0;x<Datos.length;x++)
          {
            //$("#combodepartamentos").append("<option value='"+ Datos[x].id_departamento+"'>"+ Datos[x].departamento+"</option>");
            $("#combodepartamentos2").append(new Option(Datos[x].departamento, Datos[x].id_departamento));
          }
        }
      });
      $('#combodepartamentos2').change(function(){   //.change
        $('#combomunicipios2').empty();
        $.getJSON('datos2.php',{Accion:'Getmunicipios', id_departamento:$('#combodepartamentos2 option:selected').val()}, function(Datos){
          for (x = 0;x<Datos.length;x++)
          {
            
            $("#combomunicipios2").append(new Option(Datos[x].municipio, Datos[x].municipio));
          }
        })
      });

    });
      
      
</script> 
  
             
<!-- ventana modal ver horario -->
<div class="modal fade" id="horarios" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-body">  

            <?php
              include("conexion.php");
              $nombre_ruta = $R['nombre_ruta'];
            ?>
          <table style="width:100%" class="table table-condensed table-hover">
            <tr>
              <td align="center"><b>Hora de salida de la ruta <?php echo $nombre_ruta; ?></b></td>
            </tr>
            <?php

              $id_rutas = $R['id_rutas'];
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

<!-- fin ventana modal -->

<!-- ventana modal agregar horario -->
<div class="modal fade" id="agregarhorarios" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-body">  
 
          <center>
          <button id="add" class="btn btn-xs btn-success">Agregar Otro Horario</button>
          <button id="del" class="btn btn-xs btn-danger">Eliminar Horario</button> <br /><br />
          
          <form action="agregar_horario.php" method="post">
          <table style="width: 45%" class="table table-hover table-condensed" id="tabla">
          
          <tbody>
            <tr class="fila-0">
              <input type="hidden" id="contador-filas" value="0" />
              <input type="hidden" name="id_rutas" value="<?= $R['id_rutas'] ?>"/>
              <input type="hidden" name="nombre_ruta" value="<?= $R['nombre_ruta'] ?>"/>
              <td style="width: 10%">Horario</td>
              <td style="width: 35%">
                <select class="form-control" name="horario[0]" style="width: 200px; height: 27px" required >
                  <option value="">---------------</option>
                  <option value="00:00:00">00:00:00</option>
                  <option value="00:10:00">00:10:00</option>
                  <option value="00:20:00">00:20:00</option>
                  <option value="00:30:00">00:30:00</option>
                  <option value="00:40:00">00:40:00</option>
                  <option value="00:50:00">00:50:00</option>
                  <option value="01:00:00">01:00:00</option>
                  <option value="01:10:00">01:10:00</option>
                  <option value="01:20:00">01:20:00</option>
                  <option value="01:30:00">01:30:00</option>
                  <option value="01:40:00">01:40:00</option>
                  <option value="01:50:00">01:50:00</option>
                  <option value="02:00:00">02:00:00</option>
                  <option value="02:10:00">02:10:00</option>
                  <option value="02:20:00">02:20:00</option>
                  <option value="02:30:00">02:30:00</option>
                  <option value="02:40:00">02:40:00</option>
                  <option value="02:50:00">02:50:00</option>
                  <option value="03:00:00">03:00:00</option>
                  <option value="03:10:00">03:10:00</option>
                  <option value="03:20:00">03:20:00</option>
                  <option value="03:30:00">03:30:00</option>
                  <option value="03:40:00">03:40:00</option>
                  <option value="03:50:00">03:50:00</option>
                  <option value="04:00:00">04:00:00</option>
                  <option value="04:10:00">04:10:00</option>
                  <option value="04:20:00">04:20:00</option>
                  <option value="04:30:00">04:30:00</option>
                  <option value="04:40:00">04:40:00</option>
                  <option value="04:50:00">04:50:00</option>
                  <option value="05:00:00">05:00:00</option>
                  <option value="05:10:00">05:10:00</option>
                  <option value="05:20:00">05:20:00</option>
                  <option value="05:30:00">05:30:00</option>
                  <option value="05:40:00">05:40:00</option>
                  <option value="05:50:00">05:50:00</option>
                  <option value="06:00:00">06:00:00</option>
                  <option value="06:10:00">06:10:00</option>
                  <option value="06:20:00">06:20:00</option>
                  <option value="06:30:00">06:30:00</option>
                  <option value="06:40:00">06:40:00</option>
                  <option value="06:50:00">06:50:00</option>
                  <option value="07:00:00">07:00:00</option>
                  <option value="07:10:00">07:10:00</option>
                  <option value="07:20:00">07:20:00</option>
                  <option value="07:30:00">07:30:00</option>
                  <option value="07:40:00">07:40:00</option>
                  <option value="07:50:00">07:50:00</option>
                  <option value="08:00:00">08:00:00</option>
                  <option value="08:10:00">08:10:00</option>
                  <option value="08:20:00">08:20:00</option>
                  <option value="08:30:00">08:30:00</option>
                  <option value="08:40:00">08:40:00</option>
                  <option value="08:50:00">08:50:00</option>
                  <option value="09:00:00">09:00:00</option>
                  <option value="09:10:00">09:10:00</option>
                  <option value="09:20:00">09:20:00</option>
                  <option value="09:30:00">09:30:00</option>
                  <option value="09:40:00">09:40:00</option>
                  <option value="09:50:00">09:50:00</option>
                  <option value="10:00:00">10:00:00</option>
                  <option value="10:10:00">10:10:00</option>
                  <option value="10:20:00">10:20:00</option>
                  <option value="10:30:00">10:30:00</option>
                  <option value="10:40:00">10:40:00</option>
                  <option value="10:50:00">10:50:00</option>
                  <option value="11:00:00">11:00:00</option>
                  <option value="11:10:00">11:10:00</option>
                  <option value="11:20:00">11:20:00</option>
                  <option value="11:30:00">11:30:00</option>
                  <option value="11:40:00">11:40:00</option>
                  <option value="11:50:00">11:50:00</option>
                  <option value="12:00:00">12:00:00</option>
                  <option value="12:10:00">12:10:00</option>
                  <option value="12:20:00">12:20:00</option>
                  <option value="12:30:00">12:30:00</option>
                  <option value="12:40:00">12:40:00</option>
                  <option value="12:50:00">12:50:00</option>
                  <option value="13:00:00">13:00:00</option>
                  <option value="13:10:00">13:10:00</option>
                  <option value="13:20:00">13:20:00</option>
                  <option value="13:30:00">13:30:00</option>
                  <option value="13:40:00">13:40:00</option>
                  <option value="13:50:00">13:50:00</option>
                  <option value="14:00:00">14:00:00</option>
                  <option value="14:10:00">14:10:00</option>
                  <option value="14:20:00">14:20:00</option>
                  <option value="14:30:00">14:30:00</option>
                  <option value="14:40:00">14:40:00</option>
                  <option value="14:50:00">14:50:00</option>
                  <option value="15:00:00">15:00:00</option>
                  <option value="15:10:00">15:10:00</option>
                  <option value="15:20:00">15:20:00</option>
                  <option value="15:30:00">15:30:00</option>
                  <option value="15:40:00">15:40:00</option>
                  <option value="15:50:00">15:50:00</option>
                  <option value="16:00:00">16:00:00</option>
                  <option value="16:10:00">16:10:00</option>
                  <option value="16:20:00">16:20:00</option>
                  <option value="16:30:00">16:30:00</option>
                  <option value="16:40:00">16:40:00</option>
                  <option value="16:50:00">16:50:00</option>
                  <option value="17:00:00">17:00:00</option>
                  <option value="17:10:00">17:10:00</option>
                  <option value="17:20:00">17:20:00</option>
                  <option value="17:30:00">17:30:00</option>
                  <option value="17:40:00">17:40:00</option>
                  <option value="17:50:00">17:50:00</option>
                  <option value="18:00:00">18:00:00</option>
                  <option value="18:10:00">18:10:00</option>
                  <option value="18:20:00">18:20:00</option>
                  <option value="18:30:00">18:30:00</option>
                  <option value="18:40:00">18:40:00</option>
                  <option value="18:50:00">18:50:00</option>
                  <option value="19:00:00">19:00:00</option>
                  <option value="19:10:00">19:10:00</option>
                  <option value="19:20:00">19:20:00</option>
                  <option value="19:30:00">19:30:00</option>
                  <option value="19:40:00">19:40:00</option>
                  <option value="19:50:00">19:50:00</option>
                  <option value="20:00:00">20:00:00</option>
                  <option value="20:10:00">20:10:00</option>
                  <option value="20:20:00">20:20:00</option>
                  <option value="20:30:00">20:30:00</option>
                  <option value="20:40:00">20:40:00</option>
                  <option value="20:50:00">20:50:00</option>
                  <option value="21:00:00">21:00:00</option>
                  <option value="21:10:00">21:10:00</option>
                  <option value="21:20:00">21:20:00</option>
                  <option value="21:30:00">21:30:00</option>
                  <option value="21:40:00">21:40:00</option>
                  <option value="21:50:00">21:50:00</option>
                  <option value="22:00:00">22:00:00</option>
                  <option value="22:10:00">22:10:00</option>
                  <option value="22:20:00">22:20:00</option>
                  <option value="22:30:00">22:30:00</option>
                  <option value="22:40:00">22:40:00</option>
                  <option value="22:50:00">22:50:00</option>
                  <option value="23:00:00">23:00:00</option>
                  <option value="23:10:00">23:10:00</option>
                  <option value="23:20:00">23:20:00</option>
                  <option value="23:30:00">23:30:00</option>
                  <option value="23:40:00">23:40:00</option>
                  <option value="23:50:00">23:50:00</option>
                </select>
              </td>
            </tr>
          </tbody>
          </table>
            <div>
              <button type="submit" name="datos2" class="btn btn-success btn-xs">Agregar</button>
            </div>
          </form>
        </center>

        <br />
            <p class="text-right">
            <button type="button" class="btn btn-success btn-xs" data-dismiss="modal">Cerrar</button>
            </p>
         
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- fin ventana modal -->

<!-- ventana modal quitar horario -->
<div class="modal fade" id="quitarhorarios" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-body">  

            <?php
              include("conexion.php");
              $nombre_ruta = $R['nombre_ruta'];
            ?>
        <center>
         <form action="eliminar_horario.php" method="post">
          <table style="width:100%" class="table table-condensed table-hover">
            <tr>
              <td align="center" colspan="2"><b>Hora de salida de la ruta <?php echo $nombre_ruta; ?></b></td>
            </tr>
            <tr>
                <td align="center"><b>Hoario</b></td>
                <td align="center"><b>Eliminar</b></td>
              </tr>
            <?php

              $id_rutas = $R['id_rutas'];
              $sql="SELECT * FROM detalle_rutas WHERE id_rutas='$id_rutas'";
              $res=mysql_query($sql)or die(mysql_error());
              while ( $tabla=mysql_fetch_array($res)) 
              {

              ?>
              
              <tr>
                 <td align="center"><?php echo $tabla['horario']; ?></td>
                 <td class="text-center"><input type='checkbox' name='casilla[]' value="<? echo $tabla['id_detalle_rutas']; ?>"><input type="hidden" name="nombre_ruta" value="<? echo $nombre_ruta; ?>"></td>
              </tr>
              <?php
               
              }

              ?>
            
          </table>
            <div>
              <button type="submit" name="datos2" class="btn btn-success btn-xs">Eliminar Horarios</button>
            </div>
         </form>
        </center>
            <br />
            <p class="text-right">
            <button type="button" class="btn btn-success btn-xs" data-dismiss="modal">Cerrar</button>
            </p>
         
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- fin ventana modal -->
</body>
</html>
	
