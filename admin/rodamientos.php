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
   
   include("conexion.php");


        
      $año_rodamiento = $_POST['año_rodamiento'];
      $mes_rodamiento = $_POST['mes_rodamiento'];
      $id_rutas = $_POST['id_rutas']; 
      $horario = $_POST['horario'];
      $filas = $_POST['filas'];
      $dia1 = $_POST['dia1'];
      $dia2 = $_POST['dia2'];
      $dia3 = $_POST['dia3'];
      $dia4 = $_POST['dia4'];
      $dia5 = $_POST['dia5'];
      $dia6 = $_POST['dia6'];
      $dia7 = $_POST['dia7'];
      $dia8 = $_POST['dia8'];
      $dia9 = $_POST['dia9'];
      $dia10 = $_POST['dia10'];
      $dia11 = $_POST['dia11'];
      $dia12 = $_POST['dia12'];
      $dia13 = $_POST['dia13'];
      $dia14 = $_POST['dia14'];
      $dia15 = $_POST['dia15'];
      $dia16 = $_POST['dia16'];
      $dia17 = $_POST['dia17'];
      $dia18 = $_POST['dia18'];
      $dia19 = $_POST['dia19'];
      $dia20 = $_POST['dia20'];
      $dia21 = $_POST['dia21'];
      $dia22 = $_POST['dia22'];
      $dia23 = $_POST['dia23'];
      $dia24 = $_POST['dia24'];
      $dia25 = $_POST['dia25'];
      $dia26 = $_POST['dia26'];
      $dia27 = $_POST['dia27'];
      $dia28 = $_POST['dia28'];
      @$dia29 = $_POST['dia29'];
      @$dia30 = $_POST['dia30'];
      @$dia31 = $_POST['dia31'];

      if (($mes_rodamiento=='Enero') || ($mes_rodamiento=='Febrero') || ($mes_rodamiento=='Marzo') || ($mes_rodamiento=='Abril') || ($mes_rodamiento=='Mayo') || ($mes_rodamiento=='Junio'))
      {
         $semestre_rodamiento = 'A';
      }
      else
      {
        $semestre_rodamiento = 'B';
      }


        $seleccion="SELECT * FROM rodamientos WHERE id_rutas='$id_rutas' AND mes_rodamiento='$mes_rodamiento' AND año_rodamiento='$año_rodamiento'";
        $resul=mysql_query($seleccion)or die(mysql_error());
        $R=mysql_fetch_array($resul);
        

        if(($id_rutas==$R['id_rutas']) && ($mes_rodamiento==$R['mes_rodamiento']) && ($año_rodamiento==$R['año_rodamiento']))
             {
               
                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h3>El Plan de Rodamiento Para Esa Ruta En Esa Fecha Ya Está Generado</h3>";
                //echo "<meta http-equiv='Refresh' content='3;url=nuevo_vehiculo.php'>";
                echo "</center>";

             }
            else
            {
              $sql="INSERT INTO rodamientos (id_rutas,
                                             mes_rodamiento,
                                             semestre_rodamiento,
                                             año_rodamiento)
                              VALUES ('$id_rutas',
                                      '$mes_rodamiento',
                                      '$semestre_rodamiento',
                                      '$año_rodamiento')";

                $insertar=mysql_query($sql) or die(mysql_error());

                $sql2="SELECT id_rodamiento FROM rodamientos ORDER BY id_rodamiento DESC LIMIT 1";
                $resultado = mysql_query($sql2)or die(mysql_error());
                while ($numero=mysql_fetch_array($resultado)) 
                {  
                  $id_rodamiento = $numero['id_rodamiento']; 
                }

                $cadena="INSERT INTO detalle_rodamiento (id_rodamiento,horario,dia1,dia2,dia3,dia4,dia5,dia6,dia7,
                                dia8,dia9,dia10,dia11,dia12,dia13,dia14,dia15,dia16,dia17,dia18,dia19,dia20,dia21,
                                dia22,dia23,dia24,dia25,dia26,dia27,dia28,dia29,dia30,dia31) 
                       VALUES ";

                for($i=0; $i<$filas; $i++ ) 
                {
                  
                    $cadena.="('".$id_rodamiento."','".$horario[$i]."','".$dia1[$i]."','".$dia2[$i]."','".$dia3[$i]."','".$dia4[$i]."',
                               '".$dia5[$i]."','".$dia6[$i]."','".$dia7[$i]."','".$dia8[$i]."','".$dia9[$i]."',
                               '".$dia10[$i]."','".$dia11[$i]."','".$dia12[$i]."','".$dia13[$i]."','".$dia14[$i]."',
                               '".$dia15[$i]."','".$dia16[$i]."','".$dia17[$i]."','".$dia18[$i]."','".$dia19[$i]."',
                               '".$dia20[$i]."','".$dia21[$i]."','".$dia22[$i]."','".$dia23[$i]."','".$dia24[$i]."',
                               '".$dia25[$i]."','".$dia26[$i]."','".$dia27[$i]."','".$dia28[$i]."','".$dia29[$i]."',
                               '".$dia30[$i]."','".$dia31[$i]."'),";
                  
                }

                  
                  $cadena_final = substr($cadena, 0, -1);
                  $cadena_final.=";";       

                  $consulta=mysql_query($cadena_final) or die(mysql_error());
                 
                

                echo "<center><br /><br /><br /><br /><br /><br /><br /><br />";
                echo "<h2>El Rodamiento Se Guardó Satisfactoriamente</h2>";
                //echo "<meta http-equiv='Refresh' content='3;url=cargar_rodamiento.php'>";
                echo "</center>";

            }

    
    

  ?> 



<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
