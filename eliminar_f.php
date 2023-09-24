
<?php

include 'conexion_2.php';

 
    $id = $_GET['id'];

    $delete = "DELETE FROM facturacion_1 WHERE id_factura ='" .$id."'";
    

    $resul2 = mysqli_query($conexion,"SELECT * FROM facturacion_1 WHERE id_factura = '$id' ");
    $filas_e = mysqli_fetch_assoc($resul2);
        $codi_a = $filas_e['codigo'];
        $cantidad_a = $filas_e['cantidad_f'];
        $resul3 = mysqli_query($conexion,"SELECT * FROM articulos_v1 WHERE codigo = '$codi_a' ");
    
    
    $filas_b = mysqli_fetch_assoc($resul3);
        $codi_b = $filas_b['codigo'];
        $cantidad_b = $filas_b['cantidad'];

    $estado = $cantidad_b + $cantidad_a;
    $end = mysqli_query($conexion,"UPDATE articulos_v1 set cantidad = '$estado' WHERE codigo = '$codi_a' ");


    $resul = mysqli_query($conexion, $delete);

    header("Location:vendedor.php");
    
    
 
    

?>