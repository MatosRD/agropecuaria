<?php
include 'conexion_2.php';
$id = $_GET['id'];
$fa = mysqli_query($conexion,  "SELECT * FROM deuda_1 WHERE nombre_d = '$id' ");
$fin = mysqli_query($conexion,"DELETE FROM deuda_1 WHERE nombre_d = '$id'");
header("location: deuda1.php");
?>