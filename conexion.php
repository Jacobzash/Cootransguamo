<?php


$host = "127.0.0.1";
$user = "root";
$pw = "";
$db = "cootransguamo";

$con=mysql_connect($host,$user,$pw)or die("Problemas al Conectar con el Server");
mysql_select_db($db,$con)or die("Problemas al Conectar con la BD");
mysql_set_charset('utf8');


?>