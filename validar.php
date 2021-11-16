<?php
session_start();
//include("conexion.php");
include_once("conexyon.php");
  
$email = $_POST['email'];
$password = $_POST['password'];
  
if ($sql="SELECT * FROM Usuarios,estado WHERE Usuarios.id_estado=estado.id_estado 
                                        AND email='$email' 
                                        AND password='$password' 
                                        AND Usuarios.id_estado=1") 
{
  //para hacer consulta
  foreach($dbh-> query($sql) as $row)
  {
    $usuario = $row['nombres_usuario'];
    $apellidos = $row['apellidos_usuario'];
    $id_usuario = $row['id_usuario'];
    $tipo_usuario = $row['id_tipo_usuario'];
  }
     /* $re=mysql_query($sql) or die(mysqli_error($con));
      while ($f=mysqli_fetch_array($re))
      {
        $arreglo[]=array('nombres_usuario'=>$f['nombres_usuario'], 
                         'apellidos_usuario'=>$f['apellidos_usuario'],
                         'id_usuario'=>$f['id_usuario'],
                         'id_tipo_usuario'=>$f['id_tipo_usuario']);
                         
      }
      */
        $arreglo[1]=$usuario;
        $arreglo[2]=$apellidos;
        $arreglo[3]=$id_usuario;
        $arreglo[0]=$tipo_usuario;

        if(isset($arreglo))
        {
        

          $_SESSION['usuario']=$arreglo;
        header("Location: ./admin/index.php"); 
           // echo  $arreglo[0];
           // echo $arreglo[1];
        }
        
          elseif ($sql= "SELECT * FROM conductores,estado WHERE conductores.id_estado=estado.id_estado 
                                                          AND email='$email' 
                                                          AND password='$password' 
                                                          AND conductores.id_estado=1") 
          {
            //$re=mysqli_query($con,$sql) or die(mysqli_error($con));
            //while ($f=mysqli_fetch_array($re))
            foreach($dbh-> query($sql) as $row2)
            {
             /* $arreglo[]=array('nombres_conductor'=>$f['nombres_conductor'],
                               'apellidos_conductor'=>$f['apellidos_conductor'], 
                               'id_conductor'=>$f['id_conductor'],
                               'id_tipo_usuario'=>$f['id_tipo_usuario']);*/
              $usuario = $row2['nombres_conductor'];
              $apellidos = $row2['apellidos_conductor'];
              $id_usuario = $row2['id_conductor'];
              $tipo_usuario = $row2['id_tipo_usuario'];
                               
            }
            $arreglo[1]=$usuario;
            $arreglo[2]=$apellidos;
            $arreglo[3]=$id_usuario;
            $arreglo[0]=$tipo_usuario;
            //echo  $arreglo[0];
            //echo $arreglo[1];
              if(isset($arreglo))
                {
                  
                    $_SESSION['usuario']=$arreglo;
                    header("Location: ./conductor/index.php"); 

                }
                 elseif ($sql= "SELECT * FROM propietarios,estado WHERE propietarios.id_estado=estado.id_estado 
                                                                  AND email='$email' 
                                                                  AND password='$password' 
                                                                  AND propietarios.id_estado=1") 
                 {
                   $re=mysqli_query($con,$sql) or die(mysqli_error($con));
                    while ($f=mysqli_fetch_array($re))
                    {
                      $arreglo[]=array('nombres_propietario'=>$f['nombres_propietario'], 
                                       'apellidos_propietario'=>$f['apellidos_propietario'],
                                       'id_propietario'=>$f['id_propietario'],
                                       'id_tipo_usuario'=>$f['id_tipo_usuario']);
                                       
                    }
                      if(isset($arreglo))
                        {
                          
                            $_SESSION['usuario']=$arreglo;
                            header("Location: ./propietario/index.php"); 
                        }
                        elseif ($sql= "SELECT * FROM taquilleros,estado WHERE taquilleros.id_estado=estado.id_estado 
                                                                  AND email='$email' 
                                                                  AND password='$password' 
                                                                  AND taquilleros.id_estado=1") 
                         {
                           $re=mysqli_query($con,$sql) or die(mysqli_error($con));
                            while ($f=mysqli_fetch_array($re))
                            {
                              $arreglo[]=array('nombres_taquillero'=>$f['nombres_taquillero'], 
                                               'apellidos_taquillero'=>$f['apellidos_taquillero'],
                                               'id_taquillero'=>$f['id_taquillero'],
                                               'id_tipo_usuario'=>$f['id_tipo_usuario']);
                                               
                            }
                              if(isset($arreglo))
                                {
                                  
                                    $_SESSION['usuario']=$arreglo;
                                    header("Location: ./taquillero/index.php"); 
                                }
                                else
                                  {
                                    header("Location: index.php?error=datos_no_validos");
                                  }
                          }
                 }
         }
         
}




 

?>