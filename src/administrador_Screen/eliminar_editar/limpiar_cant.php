<?php    

include './../../conexion_DB/Conexion.php';

$ff = 0 ;

$delete = mysqli_query($conexion, "UPDATE inventario SET cantidad_vendida = '$ff' WHERE cantidad_vendida  ");
header("location: ./../inicio_administrador.php");

?>