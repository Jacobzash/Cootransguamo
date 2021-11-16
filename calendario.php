<!DOCTYPE html>
<html>
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
#calendar { font-family:Arial; font-size:12px; }
#calendar caption {text-align:left; padding:5px 10px; background-color:#003366; color:#fff; font-weight:bold; }
#calendar th { background-color:#006699; color:#fff; width:40px; }
#calendar td { text-align:right; padding:2px 5px; background-color:silver; }
#calendar .hoy { background-color:red; }
.rojo { color:#FF0000; }
.amarillo { color:#F7FE2E; }
.verde { color:#01DF01 ;}
</style>
</head>
<body>
<div class="container-fluid">
  <div class="row">

		<?php 
		# definimos los valores iniciales para nuestro calendario
		$month=date("n");
		$year=date("Y");
		$diaActual=date("j");
		# Obtenemos el dia de la semana del primer dia
		$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
		"Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$dias=array(1=>"Lunes","Martes", "Miércoles", "Jueves", "Viernes", "Sábado","Domingo");

		//definimos meses y años pasados, meses y años posteriores
		if (!isset($_REQUEST["mes"])) $_REQUEST["mes"] = date("n");
		if (!isset($_REQUEST["anio"])) $_REQUEST["anio"] = date("Y");

		$month = $_REQUEST["mes"];
		$year = $_REQUEST["anio"];

		$prev_year = $year;
		$next_year = $year;
		$pasados = $year;
		$futuros = $year;
		$prev_month = $month-1;
		$next_month = $month+1;

		if ($prev_month == 0 ) 
		{
			$prev_month = 12;
			$prev_year = $year - 1;
		}
		elseif($next_month == 13 ) 
		{
			$next_month = 1;
			$next_year = $year + 1;
		}
		else
		{
			$prev_month=$month-1;
			$next_month=$month+1;
			$pasados=$year-1;
			$futuros=$year+1;
		}


		echo'<table class="table table-condensed table-hover" id="fecha" style="width: 21%" >'; 
		echo '<tr class="info" >';
		//echo'<a href="javascript:void(0);" onclick="getElementById("top");"></a>';

		$previo = $_SERVER['PHP_SELF'].'?mes='. $prev_month.'&anio='. $prev_year."#top";
		$antes = $_SERVER['PHP_SELF'].'?anio='. $pasados."#top";

		echo'<td width="3%" bgcolor="#f2f2f2"><a href='.$antes.'><==</a></td>';
		echo'<td width="3%" bgcolor="#f2f2f2"><a href='.$previo.'><==</a></td>';

		echo '<td width="*" colspan="3" align="center" bgcolor="#f2f2f2">'.$meses[$month].", ".$year.'</td>';

		$despues = $_SERVER['PHP_SELF'].'?anio='. $futuros."#top";
		$next = $_SERVER["PHP_SELF"]."?mes=". $next_month."&anio=".$next_year."#top";

		echo'<td width="3%" bgcolor="#f2f2f2"><a href='.$despues.'>==>&nbsp;&nbsp;</a></td>';
		echo'<td width="3%" bgcolor="#f2f2f2"><a href='.$next.'>==></a></td>';
		echo '</tr>';

		echo'<tr>'; 
		echo'<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th>';
		echo'<th class="dom">Dom</th>';
		echo'</tr>';
		echo'<tr bgcolor="#ececec">';

		# Devuelve 0 para domingo, 6 para sabado
		$diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7; //elimine $dia antes de $month
		# Obtenemos el ultimo dia del mes
		$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
		$last_cell=$diaSemana+$ultimoDiaMes;
		// hacemos un bucle hasta 43, que es el máximo de valores que puede
		// haber... 6 filas de 7 dias
		for($i=1;$i<=43;$i++)
		{
		if($i==$diaSemana)
		{
		// determinamos en que dia empieza
		//agregamos el dia semanal
		$day=1;
		}
		if($i<$diaSemana || $i>=$last_cell)
		{
		// celda vacia
		echo "<td> </td>";
		}else{
		// mostramos el dia
		if($day==$diaActual)
		echo "<td class='hoy'>$day</td>";
		else
		echo "<td>$day</td>";
		$day++;
		}
		// cuando llega al final de la semana, iniciamos una columna nueva
		if($i%7==0)
		{ 
		echo "</tr><tr>\n";
		}
		}

		echo'</table>';
		setlocale(LC_ALL, 'esp_ESP');
		$dia=strftime("%A, %d de %B de %Y");
		echo'<div id="feet">';
		echo"$dia";
		echo'</div>';
		?>

	</div>
</div>


 <script src="js/jquery-1.11.3.min.js"></script>
 <script src="js/bootstrap.js"></script>
</body>
</html>