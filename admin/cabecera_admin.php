<?php
//session_start();
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
<style>
.dropdown-submenu{position:relative;}
.dropdown-submenu>.dropdown-menu{
  top:0;left:100%;
  max-width:180px;
  margin-top:-6px;
  margin-left:-1px;
  -webkit-border-radius:0 6px 6px 6px;
  -moz-border-radius:0 6px 6px 6px;
  border-radius:0 6px 6px 6px;
}
.dropdown-submenu:hover>.dropdown-menu{display:block;}
.dropdown-submenu>a:after{
  display:block;content:" ";
  float:right;
  width:0;
  height:0;
  border-color:transparent;
  border-style:solid;
  border-width:5px 5px 5px 0;
  border-right-color:#999;
  margin-top:5px;
  margin-right:10px;
}
.dropdown-submenu:hover>a:after{border-left-color:#ffffff;}
.dropdown-submenu.pull-left{float:none;}
.dropdown-submenu.pull-left>.dropdown-menu{
  left:-100%;
  margin-left:10px;
  -webkit-border-radius:6px 0 6px 6px;
  -moz-border-radius:6px 0 6px 6px;
  border-radius:6px 0 6px 6px;
}
.dropdown-submenu>a.caret-right:after {
  border-left: 4px solid #000;
  border-right: 0;
  border-top: 4px solid transparent;
  border-bottom: 4px solid transparent;
}
</style>
<nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acolapsar">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
              <a href="index.php" class="navbar-brand" style="height: 60px; vertical-align: middle;"><img src="img/logo2.png" width="200" height="43" ></a>
            </div>
             <div class="collapse navbar-collapse" id="acolapsar" style="vertical-align: middle;">
              <ul class="nav navbar-nav">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rodamiento <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="cargar_rodamiento.php" target="principal">Rodamiento Mensual </a></li>
                    <li><a href="listar_rodamiento.php" target="principal">Ver Rodamiento </a></li>
                    
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
                  <ul class="dropdown-menu">

                    <li class="menu-item dropdown dropdown-submenu">
                      <a class="dropdown-toggle caret-right" data-toggle="dropdown" href="" target="principal">Propietarios</a>
                      <ul class="dropdown-menu">
                        <li><a class="menu-item" href="agregar_propietario.php" target="principal">Nuevo Propietario</a></li>
                        <li><a class="menu-item" href="buscar_propietario.php" target="principal">Buscar Propietario</a></li>
                        <li><a class="menu-item" href="actualizar_propietario.php" target="principal">Actualizar Propietario</a></li>
                        <li><a class="menu-item" href="relacionar_vehiculo.php" target="principal">Relacionar Vehiculo</a></li>
                        <li><a class="menu-item" href="relacionar_conductor.php" target="principal">Relacionar Conductor</a></li>                        
                      </ul>
                    </li> 
                    <li class="divider"></li>
                    <li class="menu-item dropdown dropdown-submenu">
                      <a class="dropdown-toggle caret-right" data-toggle="dropdown" href="" target="principal">Conductores</a>
                      <ul class="dropdown-menu">
                        <li><a class="menu-item" href="agregar_conductores.php" target="principal">Nuevo Conductor</a></li>
                        <li><a class="menu-item" href="buscar_conductor.php" target="principal">Buscar Conductor</a></li>
                        <li><a class="menu-item" href="actualizar_conductor.php" target="principal">Actualizar Conductor</a></li>
                        <li><a class="menu-item" href="asignar_conductor.php" target="principal">Asignar Vehiculo</a></li>                       
                      </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="menu-item dropdown dropdown-submenu">
                      <a class="dropdown-toggle caret-right" data-toggle="dropdown" href="" target="principal">Taquilleros</a>
                      <ul class="dropdown-menu">
                        <li><a class="menu-item" href="agregar_taquillero.php" target="principal">Nuevo Taquillero</a></li>
                        <li><a class="menu-item" href="buscar_taquillero.php" target="principal">Buscar Taquillero</a></li>
                        <li><a class="menu-item" href="actualizar_taquillero.php" target="principal">Actualizar Taquillero</a></li>                       
                      </ul>
                    </li>     
                    <li class="divider"></li>
                    <li class="menu-item dropdown dropdown-submenu">
                      <a class="dropdown-toggle caret-right" data-toggle="dropdown" href="" target="principal">Administrador</a>
                      <ul class="dropdown-menu">
                        <li><a class="menu-item" href="agregar_admin.php" target="principal">Nuevo Administrador</a></li>
                        <li><a class="menu-item" href="buscar_admin.php" target="principal">Buscar Administrador</a></li>
                        <li><a class="menu-item" href="actualizar_admin.php" target="principal">Actualizar Administrador</a></li>                       
                      </ul>
                    </li> 

                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vehiculos <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="nuevo_vehiculo.php" target="principal">Nuevo Vehiculo</a></li>
                    <li><a href="buscar_vehiculo.php" target="principal">Buscar Vehiculo </a></li>
                    <li><a href="actualizar_vehiculo.php" target="principal">Actualizar Vehiculo </a></li>
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rutas <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="nueva_ruta.php" target="principal">Agregar Ruta</a></li>
                    <li><a href="buscar_ruta.php" target="principal">Buscar Ruta</a></li>
                    <li><a href="actualizar_ruta.php" target="principal">Actualizar Ruta </a></li>
                    
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informes <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="listar_conductor.php" target="principal">Conductores</a></li>
                    <li><a href="listar_conductores_fecha.php" target="principal">Conductores por fecha</a></li>
                    <li><a href="listar_propietario.php" target="principal">Propietarios</a></li>
                    <li><a href="listar_propietarios_fecha.php" target="principal">Propietarios por fecha</a></li>
                    <li><a href="conductor_vehiculo.php" target="principal">Conductor-Vehiculo</a></li>
                    <li><a href="vehiculo_conductor.php" target="principal">Vehiculo-Conductor</a></li>
                    <li><a href="listar_taquilleros.php" target="principal">Taquilleros</a></li>
                    <li><a href="listar_vehiculos.php" target="principal">Vehiculos</a></li>
                    <li><a href="listar_vehiculos_fecha.php" target="principal">Vehiculos por fecha</a></li>
                    <li><a href="listar_rutas.php" target="principal">Rutas </a></li>
                
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sistema <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="cambiar_pw.php" target="principal"><i class="fa fa-unlock-alt"></i>&nbsp;Cambiar Contraseña</a></li>
                    <li><a href="datos_admin_activo.php" target="principal">Actualizar Datos</a></li>
                    <li><a href="backup2.php" target="principal">Copia de Seguridad</a></li>
                    <li><a href="restore.php" target="principal">Restaurar Copia </a></li>
                  </ul>
                </li>
              </ul>

             

              <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-user"></i>&nbsp;<?php $temp=$_SESSION['usuario']; echo $temp[1]; ?> &nbsp; <?php echo $temp[2]; ?></a></li>
                <li><a href="cerrarsesion.php"><i class="fa fa-user-times"></i>&nbsp;Cerrar Sesión</a></li>
              </ul>
             </div>
          </div>
</nav>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>


