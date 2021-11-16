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
        <table style="width: 50%" class="table table-hover table-condensed">
          <tr>
            <td style="background-color: #f0b650; color: #fff" colspan="8" align="center">
              <h2>Plan Rodamiento Enero 2018 - Guamo-Girardot</h2>
            </td>
          </tr>
          <tr>
            <td style="width: 10%; text-align: left; font-size: x-large;"><b>Horario</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>1</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>2</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>3</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>4</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>5</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>6</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>7</b></td>
          </tr>
          <tr>
            <td style="width: 10%; text-align: left; vertical-align: middle; font-size: x-large;" rowspan="9"><b>6:00 a.m</b>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
          </tr>
          <tr>
            
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>8</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>9</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>10</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>11</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>12</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>13</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>14</b></td>
          </tr>
          <tr>
            
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
          </tr>
          <tr>
          
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>15</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>16</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>17</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>18</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>19</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>20</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>21</b></td>
          </tr>
          <tr>
            
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
          </tr>
          <tr>
            
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>22</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>23</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>24</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>25</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>26</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>27</b></td>
            <td style="width: 5%; text-align: center; font-size: x-large;"><b>28</b></td>
          </tr>
          <tr>
            
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
          </tr>
          <tr>
            
            <td style="width: 5%; text-align: center;font-size: x-large;"><b>29</b></td>
            <td style="width: 5%; text-align: center;font-size: x-large;"><b>30</b></td>
            <td style="width: 5%; text-align: center;font-size: x-large;"><b>31</b></td>
            <td style="width: 5%">&nbsp;</td>
            <td style="width: 5%">&nbsp;</td>
            <td style="width: 5%">&nbsp;</td>
            <td style="width: 5%">&nbsp;</td>
          </tr>
          <tr>
            
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%; text-align: center; color: #ac0407"><b>
              <?php
                    $numeros = array(172,63,61,245,151,124,251,33,225,16,235,138,159,179);
                    echo $numeros[array_rand($numeros)];
              ?></b>
            </td>
            <td style="width: 5%">
                
            </td>
            <td style="width: 5%">
              
            </td>
            <td style="width: 5%">
              
            </td>
            <td style="width: 5%">
              
            </td>
          </tr>


          <tr>
            <td align="center" colspan="8">
              <button type="boton" value="Generar" class="btn btn-success btn-xs" onclick="javascript:window.location.reload();">Generar</button>
              <button type="submit" name="datos" class="btn btn-success btn-xs">Guardar</button>
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
            
    if(isset($_POST['documento_propietario']) && !empty($_POST['documento_propietario']) && 
       isset($_POST['nombres_propietario']) && !empty($_POST['nombres_propietario']) &&
       isset($_POST['apellidos_propietario']) && !empty($_POST['apellidos_propietario']) && 
       isset($_POST['direccion_propietario']) && !empty($_POST['direccion_propietario']) && 
       isset($_POST['celular_propietario']) && !empty($_POST['celular_propietario']) &&
       isset($_POST['email']) && !empty($_POST['email']) &&
       isset($_POST['password']) && !empty($_POST['password']))
    {
        $documento_propietario = ($_POST['documento_propietario']);
        $nombres_propietario = ($_POST['nombres_propietario']);
        $apellidos_propietario = ($_POST['apellidos_propietario']);
        $direccion_propietario = ($_POST['direccion_propietario']);
        $celular_propietario = ($_POST['celular_propietario']);
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        $id_estado = 1;
        $id_tipo_usuario = 3;


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
               
                $sql="INSERT INTO propietarios (documento_propietario,
                                                nombres_propietario,
                                                apellidos_propietario,
                                                direccion_propietario,
                                                celular_propietario,
                                                email,
                                                password,
                                                id_estado,
                                                id_tipo_usuario)
                              VALUES ('$documento_propietario',
                                      '$nombres_propietario',
                                      '$apellidos_propietario',
                                      '$direccion_propietario',
                                      '$celular_propietario',
                                      '$email',
                                      '$password',
                                      '$id_estado',
                                      '$id_tipo_usuario')";

                $insertar=mysql_query($sql) or die(mysql_error());

                echo "<center><br /><br /><br /><br /><br /><br />";
                echo "<h2>El Propietario se ha Registrado Satidfactoriamente</h2>";
                echo "<meta http-equiv='Refresh' content='3;url=agregar_propietario.php'>";
                echo "</center>";
             }


        


    }
      else
        {
      
              echo "<center><br /><br /><br /><br /><br /><br />";
              echo "<h2>Faltan datos del formulario</h2>";
              echo "<meta http-equiv='Refresh' content='3;url=agregar_propietario.php'>";
              echo "</center>";
        }

}

?>


<!--Fin del tercer contenedor-->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.js"></script>

  


</body>
</html>
	
