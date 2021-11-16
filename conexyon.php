<?php
/*Conexion a base de datos usando driver invocation */
/*remplazar mysql:dbname: aqui_nombre_de_la_BD*/
$dbserver = 'mysql:dbname=cootransguamo;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dbserver, $user, $password);

} catch (PDOException $e) {
    echo 'la conexion ha fallado: ' . $e->getMessage();
}
/* insert-update-delete
if(!$dbh-> query($sql)){
    echo "Error elimiando";
  }else{
    header("location:/diseno/eje1.php");
  } 
  */
?>
