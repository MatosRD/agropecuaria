<?php
include 'conexion_2.php';

 
    $id = $_GET['id'];
    $delete = "DELETE FROM articulos_v1 WHERE id_articulo ='$id'";
    $resul = mysqli_query($conexion, $delete);

    header("Location: administracion.php");
    
?>
    