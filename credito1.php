<?php

include 'conexion_2.php';

if(!empty(['MMG'])){
    if(!empty($_POST['bu']) ){
        $dd = $_POST['bu'];
        $ff = $_POST['mu'];
        $ced = $_POST['cedu'];
        $nom = $_POST['nombre'];
        $itbis = $_POST['country'];
        

        srand (time());
        $numero_aleatorio = rand(1,1000);

        $d = mysqli_query($conexion, "SELECT * FROM deuda_1 WHERE nombre_d = '$nom' and cedula = '$ced' "); 
        
        $filas_a = mysqli_fetch_assoc($d);
        $bona = $filas_a['abonacion'];           
        $deu = $filas_a['deuda'];
        $fe = $filas_a['fecha_a'];
        
        $busf = "SELECT * FROM articulos_v1 WHERE codigo = '$ff'";
        $ejecf = mysqli_query($conexion, $busf);

        $filas_f = mysqli_fetch_assoc($ejecf);
        $codigo_f = $filas_f['codigo'];        
        $descrip_F = $filas_f['descripcion'];
        $precio_ff = $filas_f['precio_v'];
        $can_f = $filas_f['cantidad'];
        $can_v = $filas_f['cantidad_v'];
        $margen = $filas_f['margen_g'];
        
        $margen_f = $margen * $dd + $itbis;
        $deu = ' DEUDA';

        $fecha=date('d/m/Y'); 
       $res = $precio_ff * $dd + $itbis  ;
       $quitar = $can_f - $dd;
       $cv = $can_v + $dd;
       
    if(mysqli_num_rows($d) > 0 ){
        if( $quitar  >= 0){

            $ins_f = "INSERT INTO deuda_1 (nombre_d, descripcion_d, cantidad_d, precio_d, sub_d, fecha, cedula, itbis) VALUES ('$nom','$descrip_F','$dd','$precio_ff','$res','$fecha','$ced','$itbis')";
            $ins_ff = ( mysqli_query( $conexion, "INSERT INTO facturacion_venta_1 (codigo, descripcion_f, cantidad_f, precio_f, sub, fecha, itbis, mar_g, nofactura) VALUES (' $codigo_f','$descrip_F + $deu','$dd','$precio_ff','0','$fecha','$itbis','$margen_f','$numero_aleatorio')"));
    $enviar = mysqli_query($conexion, $ins_f);
    $quitar = $can_f - $dd;
    
    $max = mysqli_query($conexion,"UPDATE articulos_v1 SET cantidad = '$quitar', cantidad_v = '$cv' WHERE codigo = '$codigo_f' " );
        
        echo'<div id="green" >  Articulo Agregado </div> ';
        

    }else{
        echo' <div id=RED>  Agotada cantidad ('.$can_f.')  </div>';
    }
    }else{
        echo'<div style="color:white;  background:red; " > Cedula o Nombre Erroneo</div>  ';
    }
}
}
?>



