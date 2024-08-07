<?php
include './../../conexion_DB/Conexion.php';

 
    $id = $_GET['id'];
    $delete = "DELETE FROM cliente WHERE id_cliente ='$id'";
    $resul = mysqli_query($conexion, $delete);

    header("Location: ./../cliente.php");
    
?>