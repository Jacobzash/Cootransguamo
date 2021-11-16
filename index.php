<!DOCTYPE html>
<html lang="es-co">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cootransguamo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
	<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>

<style type="text/css">
  body {
    background-image: url(img/imagen.png); 
    background-position: center center; 
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-color: #fff;
}
</style>
</head>
<body>
<!-- primer contenedor carrusel imagenes--> 
<div class="container-fluid">
  <div class="row">
      <nav class="navbar navbar-inverse navbar-fixed-top"> <!--role="navigation">-->
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acolapsar">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
                <a href="index.php" class="navbar-brand" style="height: 80px; vertical-align: middle;"><img src="img/logo.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="acolapsar">
              <ul class="nav navbar-nav navbar-right">
                <img src="img/logo_final.png" style="width: 110px; height: 70px; vertical-align: middle;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </ul>
            </div>
          </div>
      </nav>
  </div>
</div>    
<!--fin del primer contenedor-->

<!-- segundo contenedor cuerpo de la pagina, formularios -->
<div class="container-fluid fondo" >
	<div class="row">	
		
      <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
				
        <p><?php 
            if(isset($_GET['error'])){
              echo '<center><h3>El Usuario o la Contraseña no son correctas</h3></center>';
             }
            ?>
        </p>
				
		
      		<table width="30%" border="0"  align="center" style="border: 2px #acacac solid" cellspacing="5" cellpadding="5">
            <form action="validar.php" method="POST"  name="form_valida" autocomplete="off">
      				<tr>
      				  <td align="center" bgcolor="#f2f2f2">
                  <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="E-Mail" style="margin-top: 60px; width:300px" required autofocus />
                  </div>    
                </td>
              </tr>
              <tr>
                <td align="center" bgcolor="#f2f2f2">
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" style="width:300px; margin-top: 10px" required />
                  </div>
                </td>
              </tr>
              <tr>
                <td align="center" bgcolor="#f2f2f2">
                  <button class="btn btn-success btn-md" type="submit" style="margin-bottom: 60px">&nbsp;Ingresar</button>
                </td>
              </tr>
            </form>
      		</table>	    
          
                <br />
                <br /><br /><br /><br />


                <nav class="navbar navbar-inverse navbar-fixed-bottom">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="#" style="text-align: left; height: 100px; vertical-align: middle; background-color: #ac0407; color: #fff; font-size: 15px">
                          <span class="glyphicon glyphicon-phone-alt"></span>&nbsp;Oficina Principal: (578)2270240-
                          Agencia Guamo: 3185147651 <br />
                          Agencia Espinal: 3185147656 - 3185147686 <br />
                          Agencia Ibagué: 3185147668 - 3138910319
                      </a>
                    </div>
                    <div class="collapse navbar-collapse" id="acolapsar" style="text-align: center; height: 100px; vertical-align: middle; background-color: #ac0407; color: #fff; font-size: 15px">
                      <ul class="nav navbar-nav navbar-right" >
                        <li><a class="navbar-brand" href="#" style="text-align: left; height: 100px; vertical-align: middle; background-color: #ac0407; color: #fff; font-size: 15px"><span class="glyphicon glyphicon-envelope"></span>&nbsp;E-mail: contacto@cootransguamo.com<br />
                        CopyRight &nbsp;<span class="glyphicon glyphicon-copyright-mark"></span>&nbsp;2021</a></li>
                      </ul>
                    </div>
                  </div>
                </nav>
		
	</div>
</div>
<!-- fin del segundo contenedor -->

<!--tercer contenedor pie de página-->



<!--Fin del tercer contenedor-->
 <script src="js/jquery-1.11.3.min.js"></script>
 <script src="js/bootstrap.js"></script>


</body>
</html>
	
