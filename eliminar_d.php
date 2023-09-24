<?php

include 'conexion_2.php';

$id = $_GET['id'];

$ff = ("DELETE FROM deuda_1 WHERE id_deuda = '$id'");


$da = mysqli_query($conexion,"SELECT * FROM deuda_1 WHERE id_deuda = '$id'");

while($fila = mysqli_fetch_assoc($da)){
    $non = $fila['descripcion_d'];
    $ca = $fila['cantidad_d'];
}

$daa = mysqli_query($conexion,"SELECT * FROM articulos_v1 WHERE descripcion = '$non'");

while($fila = mysqli_fetch_assoc($daa)){
    $c = $fila['cantidad'];
}

$sun = $ca + $c ;

$ee = mysqli_query($conexion,"UPDATE articulos_v1 SET cantidad = '$sun' WHERE descripcion ='$non'  ");
$fin = mysqli_query($conexion,$ff);

header("location: deuda1.php");

?>