<?php
include("conexion.php");

$colores = array(172, 128, 33, 16, 66,151,252);


echo "Valor aleatorio: ". $colores[array_rand($colores)];
echo "<br /><br />";

echo count($colores);
	


?>

