<?php
include("conexion.php");
$Accion = $_REQUEST['Accion'];
if(is_callable($Accion))
{
	$Accion();
}
function Getdepartamentos()
{
	header('Content-type: application/json');
	$departamentos = array();
	$sql = "SELECT * FROM departamentos";
	$consulta = mysql_query($sql);
	while ($fila = mysql_fetch_assoc($consulta))
	{
		$departamentos[] = $fila;
	}
	echo json_encode($departamentos);
}
function Getmunicipios()
{
	header('Content-type: application/json');
	$municipios = array();
	$sql = "SELECT * FROM municipios WHERE id_departamento = '{$_REQUEST['id_departamento']}'";
	$consulta = mysql_query($sql);
	while ($fila = mysql_fetch_assoc($consulta))
	{
		$municipios[] = $fila;
	}
	echo json_encode($municipios);
}


?>
