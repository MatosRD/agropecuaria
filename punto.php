<?php

include 'conexion_2.php';

if(!empty(['KK'])){
    if(!empty($_POST['bu']) ){
        $dd = $_POST['bu'];
        $ff = $_POST['mu'];
        $itbis = $_POST['country'];
        
        
        
     
    $eror = mysqli_query($conexion, "SELECT * FROM articulos_v1 WHERE codigo  ");
    
        
    $busf = "SELECT * FROM articulos_v1 WHERE codigo = '$ff'";
    $ejecf = mysqli_query($conexion, $busf);

    $filas_f = mysqli_fetch_assoc($ejecf);
        $codigo_f = $filas_f['codigo'];        
        $descrip_F = $filas_f['descripcion'];
        $precio_ff = $filas_f['precio_v'];
        $can_f = $filas_f['cantidad'];
        $can_v = $filas_f['cantidad_v'];
        $margen = $filas_f['margen_g'];

        $margen_1 = $margen * $dd + $itbis;


        $fecha=date('d/m/Y'); 
        $res = $precio_ff * $dd + $itbis  ;
        $quitar = $can_f - $dd;
    
       if( $quitar  >= 0){

    $ins_f = "INSERT INTO facturacion_1 (codigo, descripcion_f, cantidad_f, precio_f, sub, fecha, itbis, mar_g) VALUES ('$codigo_f','$descrip_F','$dd','$precio_ff','$res','$fecha','$itbis','$margen_1')";
    $enviar = mysqli_query($conexion, $ins_f);


    $quitar = $can_f - $dd;
    $da = $can_v + $dd ;    
    $max = mysqli_query($conexion,"UPDATE articulos_v1 SET cantidad = '$quitar', cantidad_v ='$da' WHERE codigo = '$codigo_f' " );
    
    


    }else{
        echo' <div id="RED"> Producto Agotado ('.$can_f.')  </div>';
    }
    }
}
?>