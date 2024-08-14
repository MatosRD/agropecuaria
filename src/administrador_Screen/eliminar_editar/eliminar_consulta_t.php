<?php
include './../../conexion_DB/Conexion.php';


    $delete = "DELETE FROM vista ";
    $resul = mysqli_query($conexion, $delete);

    header("Location: ./../consulta.php");
    
?>