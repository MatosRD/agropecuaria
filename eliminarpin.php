<?php

include 'conexion_2.php';


$id = $_GET['id'];

$ff = mysqli_query($conexion,"DELETE FROM usuarios_1 WHERE id_usuarios = '$id'  ");
header("location: user.php");

?>