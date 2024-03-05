<?php
include 'conexion_2.php';

    $m = 1;
    $cantim = 1;
    $itbis = 54;


    $id_f = $_GET['id'];

    $busf = "SELECT * FROM articulos_v1 WHERE id_articulo = '$id_f'";
    $ejecf = mysqli_query($conexion, $busf);

    $filas_f = mysqli_fetch_assoc($ejecf);
        $codigo_f = $filas_f['codigo'];        
        $descrip_F = $filas_f['descripcion'];
        $precio_ff = $filas_f['precio_v'];
        $can_f = $filas_f['cantidad'];


        $fecha=date('d/m/Y'); 
       $res = $precio_ff * $m + $itbis  ;
        


    $ins_f = "INSERT INTO facturacion_1 (codigo, descripcion_f, cantidad_f, precio_f, sub, fecha) VALUES ('$codigo_f','$descrip_F','$m','$precio_ff','$res','$fecha')";
    $enviar = mysqli_query($conexion, $ins_f);


    $quitar = $can_f - $cantim;

    $max = mysqli_query($conexion,"UPDATE articulos_v1 SET cantidad = '$quitar' WHERE codigo = '$codigo_f' " );
    

?>




