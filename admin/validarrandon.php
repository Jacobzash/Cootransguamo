<?php

$arrayNumeros = array();
function generateAleatoreo($data)
{
	$numero = array_rand($data);
	var_dump($numero);
	if (in_array($numero, $arrayNumeros)){
		return generateAleatoreo($data);
	}else{
		array_push($arrayNumeros, $numero);
		return $numero;
	}
}

?>