<?php    

include 'conexion_2.php';

$ff = 0 ;

$delete = mysqli_query($conexion, "UPDATE articulos_v1 SET cantidad_v = '$ff' WHERE cantidad_v  ");
header("location: administracion.php");

?>