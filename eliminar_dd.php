<?php
include 'conexion_2.php';


$id = $_GET['id'];

$sun = 0 ;

$fa = mysqli_query($conexion,  "SELECT * FROM deuda_1 WHERE nombre_d = '$id' ");
while($fila = mysqli_fetch_assoc($fa)){
    $de = $fila['descripcion_d'];
    $ca = $fila['cantidad_d'];

    $ff = mysqli_query($conexion,  "SELECT * FROM articulos_v1 WHERE descripcion = '$de' ");
    while($filas = mysqli_fetch_assoc($ff)){
        $cas = $filas['cantidad'];
     }

     $sun = $cas + $ca ;

    $tt = mysqli_query($conexion,"UPDATE articulos_v1 SET cantidad = '$sun' WHERE descripcion = '$de' ");
}

$fin = mysqli_query($conexion,"DELETE FROM deuda_1 WHERE nombre_d = '$id'");
header("location: deuda1.php");


?>