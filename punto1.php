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


        $fecha=date('d/m/Y'); 
       $res = $precio_ff * $dd + $itbis  ;
       $quitar = $can_f - $dd;


    $ins_f = "INSERT INTO cotizacion_1 (codigo_C, descripcion_c, cantidad_c, precio_c, sub_c, fecha_c, itbis_c) VALUES ('$codigo_f','$descrip_F','$dd','$precio_ff','$res','$fecha','$itbis')";
    $enviar = mysqli_query($conexion, $ins_f);




    }
}



?>