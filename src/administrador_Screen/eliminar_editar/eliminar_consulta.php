<?php
include './../../conexion_DB/Conexion.php';

 
    $id = $_GET['id'];
    $delete = "DELETE FROM vista WHERE id_vista ='$id'";
    $resul = mysqli_query($conexion, $delete);

    header("Location: ./../consulta.php");
    
?>