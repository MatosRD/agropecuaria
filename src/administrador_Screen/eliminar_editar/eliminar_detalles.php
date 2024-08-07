<?php
include './../../conexion_DB/Conexion.php';

 
    $id = $_GET['id'];

    $delete = "DELETE FROM pedidos_c WHERE id_pedidos ='" .$id."'";
    

    $resul2 = mysqli_query($conexion,"SELECT * FROM pedidos_c WHERE id_pedidos = '$id' ");
    $filas_e = mysqli_fetch_assoc($resul2);
        $codi_a = $filas_e['codigo'];
        $cantidad_a = $filas_e['cantidad'];
        $resul3 = mysqli_query($conexion,"SELECT * FROM inventario WHERE codigo = '$codi_a' ");
    
    
    $filas_b = mysqli_fetch_assoc($resul3);
        $codi_b = $filas_b['codigo'];
        $cantidad_b = $filas_b['cantidad'];
        $cantidad_v = $filas_b['cantidad_vendida'];

    $estado = $cantidad_b + $cantidad_a;
    $ad = abs($cantidad_v - $cantidad_a);
    $end = mysqli_query($conexion,"UPDATE inventario set cantidad = '$estado' , cantidad_vendida = '$ad' WHERE codigo = '$codi_a' ");

    $resul = mysqli_query($conexion, $delete);

    header("location: ./../pedidos.php");
    
    
    
 
    

?>