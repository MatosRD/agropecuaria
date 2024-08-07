<?php
include './../../conexion_DB/Conexion.php';

 
    $id = $_GET['id'];
    $delete = "DELETE FROM inventario WHERE id_inventario ='$id'";
    $resul = mysqli_query($conexion, $delete);

    header("Location: ./../inicio_administrador.php");
    
?>