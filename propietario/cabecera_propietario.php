<?php
//session_start();
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
<nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acolapsar">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
              <a href="index.php" class="navbar-brand" style="height: 60px; vertical-align: middle;"><img src="img/logo2.png" width="200" height="43"></a>
            </div>
            <div class="collapse navbar-collapse" id="acolapsar">
                <ul class="nav navbar-nav">
                    <li><a href="actualizar_propietario.php" target="principal">Actualizar Datos </a></li>
                    <li><a href="ver_vehiculos.php" target="principal">Ver Vehiculos </a></li>
                    <li><a href="ver_conductores.php" target="principal">Ver Conductores </a></li>
                    <li><a href="cambiar_pw.php" target="principal"><i class="fa fa-unlock-alt"></i>&nbsp;Cambiar Contraseña</a></li>    
              </ul>
            
              
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><i class="fa fa-user"></i>&nbsp;<?php $temp=$_SESSION['usuario']; echo $temp[1]; ?>&nbsp; <?php echo $temp[2]; ?></a></li>
                  <li><a href="cerrarsesion.php"><i class="fa fa-user-times"></i>&nbsp;Cerrar Sesión</a></li>
                </ul>
            </div>
          </div>
</nav>