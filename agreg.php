<?php

include 'conexion_2.php';
if(!empty('butagre')){
    if(!empty($_POST["codigo"]) ){
        $cdarticulo = $_POST['codigo'];
        $darticulo = $_POST['descripcion'];
        $carticulo = $_POST['cantidad'];
        $uarticulo = $_POST['unidad'];
        $pcarticulo = $_POST['precio_compra'];
        $particulo = $_POST['cantidad_v'];
        $pvarticulo = $_POST['precio_venta'];
        $mgarticulo = $_POST['margen_ganancia'];
        $csarticulo = $_POST['compra_suplidor'];
        $vparticulo = $_POST['venta_producto'];


        $pin = mysqli_query($conexion,"SELECT * FROM articulos_v1 WHERE codigo = '$cdarticulo'");


    if(mysqli_num_rows($pin) == 0 ){
        $insetar = "INSERT INTO articulos_v1 (codigo, descripcion, cantidad, unidad, precio_c, cantidad_v, precio_v, margen_g, compra_p_s, venta_p_n) VALUE ('$cdarticulo','$darticulo','$carticulo', '$uarticulo','$pcarticulo',
        '$particulo','$pvarticulo', '$mgarticulo','$csarticulo','$vparticulo')";
        mysqli_query($conexion, $insetar);
        echo '<div class="agregado">Articulo agregado Exitosamente</div>
        <a href="agregar.php" class="mas">agregar mas articulos ++</a>
        ';
        exit();
    }else{
        echo'<div style="text-align:center; background:red; color:white; border-radius:10px; padding:10px 15px; " >codigo ya Registrado  </div>';
    }     
    }
}
?>