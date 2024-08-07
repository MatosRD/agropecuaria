<?php
// session_start();    

include 'Conexion.php';
if(!empty(['KK'])){
    if(!empty($_POST['cantidad']) ){
        $codigo = $_POST['codigo'];
        $number = $_POST['cantidad'];
        
        date_default_timezone_set('America/Santo_Domingo');
        $fecha = date('d-m-Y');
        $vendedor = $_SESSION["nombres"];
        
     
    $eror = mysqli_query($conexion, "SELECT * FROM inventario WHERE codigo = '$codigo'");

    $filas_f = mysqli_fetch_assoc($eror);
        $codigo = $filas_f['codigo'];        
        $articulo = $filas_f['articulo'];
        $precio_c = $filas_f['precio_costo'];
        $precio_v = $filas_f['precio_venta'];
        $cantidad = $filas_f['cantidad'];
        $ganancia = $filas_f['ganancia'];
        $cantidad_v = $filas_f['cantidad_vendida'];
        
        $nasn = 11;

        $sumar = $number +  $cantidad_v; 
        $quitar = $cantidad - $number;
        $sub = $precio_v * $number;
        $estado = 'activo';
        $descuento = 0;

       if( $quitar  >= 0){

    $ins_f = "INSERT INTO pedidos (articulos, fecha, vendedor, codigo, precio_costo, precio_venta, cantidad, ganancia, sub_total,descuento,estado,total)
     VALUES ('$articulo','$fecha','$vendedor','$codigo','$precio_c','$precio_v','$number','$ganancia','$sub','$descuento','$estado','$sub')";
    $enviar = mysqli_query($conexion, $ins_f);


    // $quitar = $can_f - $dd;
    // $da = $can_v + $dd ;    
    $max = mysqli_query($conexion,"UPDATE inventario SET cantidad = '$quitar', cantidad_vendida ='$sumar' WHERE codigo = '$codigo'" );
    
    


    }else{
        echo' <div id="RED"> Producto Agotado ('.$cantidad.')  </div>';
    }
    }
}
?>