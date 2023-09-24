<?php

include 'conexion_2.php';
if(!empty('butagre')){
    if(!empty($_POST["codigo"]) and !empty($_POST["descripcion"]) and !empty($_POST["cantidad"]) and !empty($_POST["unidad"]) and !empty($_POST["precio_compra"])      
    and !empty($_POST["porcentage"])  and !empty($_POST["precio_venta"])  and !empty($_POST["margen_ganancia"])  and !empty($_POST["compra_suplidor"])  and !empty($_POST["venta_producto"]) ){
        $cdarticulo = $_POST['codigo'];
        $darticulo = $_POST['descripcion'];
        $carticulo = $_POST['cantidad'];
        $uarticulo = $_POST['unidad'];
        $pcarticulo = $_POST['precio_compra'];
        $particulo = $_POST['porcentage'];
        $pvarticulo = $_POST['precio_venta'];
        $mgarticulo = $_POST['margen_ganancia'];
        $csarticulo = $_POST['compra_suplidor'];
        $vparticulo = $_POST['venta_producto'];

        $insetar = "INSERT INTO articulos_v1 (codigo, descripcion, cantidad, unidad, precio_c, porcentage, precio_v, margen_g, compra_p_s, venta_p_n) VALUE ('$cdarticulo','$darticulo','$carticulo', '$uarticulo','$pcarticulo',
        '$particulo','$pvarticulo', '$mgarticulo','$csarticulo','$vparticulo')";
        mysqli_query($conexion, $insetar);
        echo '<div class="agregado">Articulo agregado Exitosamente</div>
        <a href="agregar.php" class="mas">agregar mas articulos ++</a>
        ';
        exit();
    }
}
?>