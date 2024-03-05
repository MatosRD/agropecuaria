<?php

include 'conexion_2.php';

 
    $id = $_GET['id'];

    $delete = "DELETE FROM cotizacion_1 WHERE id_cotizacion = '$id'";    
    $resul = mysqli_query($conexion, $delete);

    header("Location: cotizacion.php");
    
    
 
    

?>