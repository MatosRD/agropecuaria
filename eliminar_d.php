<?php

include 'conexion_2.php';

$id = $_GET['id'];

$ff = "DELETE FROM deuda_1 WHERE id_deuda = '$id'";


$da = mysqli_query($conexion,"SELECT * FROM deuda_1 WHERE id_deuda = '$id'");

while($fila = mysqli_fetch_assoc($da)){
    $non = $fila['descripcion_d'];
    $ca = $fila['cantidad_d'];
}

$daa = mysqli_query($conexion,"SELECT * FROM articulos_v1 WHERE descripcion = '$non'");

while($fila = mysqli_fetch_assoc($daa)){
    $c = $fila['cantidad'];
    $cc = $fila['cantidad_v'];
}

$sun = $ca + $c ;
$nn = abs($ca - $cc);

if($sun >= 0){
    $ee = mysqli_query($conexion,"UPDATE articulos_v1 SET cantidad = '$sun', cantidad_v = ' $nn ' WHERE descripcion ='$non'  ");
    $fin = mysqli_query($conexion,$ff);    
}else{
    echo'cantidad es igual 0';
}


header("location: deuda1.php");
?>