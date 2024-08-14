<?php
include './../../conexion_DB/Conexion.php';

 
    
    $delete = "DELETE  FROM pedidos_c WHERE estado ='cerrado'";
    $resul = mysqli_query($conexion, $delete);

    header("Location: ./../pedidos.php");
    
?>