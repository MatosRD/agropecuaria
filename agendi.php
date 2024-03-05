<?php
include 'conexion_2.php';

if(!empty(['pp'])){
    if(!empty($_POST['nom_cliente'])){
        $nom = $_POST['nom_cliente'];
        $ced = $_POST['cedula_cliente'];
        $cod = $_POST['codigo_cliente'];
        $coun = $_POST['country'];
        $can = $_POST['cantidad'];

        srand (time());
        $numero_aleatorio = rand(1,1000);

        $d = mysqli_query($conexion, "SELECT * FROM deuda_1 WHERE nombre_d = '$nom' and cedula = '$ced' ");    
        
        $filas_a = mysqli_fetch_assoc($d);
        $bona = $filas_a['abonacion'];           
        $deu = $filas_a['deuda'];
        $fe = $filas_a['fecha_a'];

        $busf = "SELECT * FROM articulos_v1 WHERE codigo = '$cod'";
        $ejecf = mysqli_query($conexion, $busf);

        $filas_f = mysqli_fetch_assoc($ejecf);
        $codigo_f = $filas_f['codigo'];        
        $descrip_F = $filas_f['descripcion'];
        $precio_ff = $filas_f['precio_v'];
        $can_f = $filas_f['cantidad'];
        $can_v = $filas_f['cantidad_v'];
        $margen = $filas_f['margen_g'];


        $margen_f = $margen * $can + $coun;
        $deu = ' DEUDA';
        $fecha=date('d/m/Y'); 
        $res = $precio_ff * $can + $coun;
        $quitar = $can_f - $can;
        $cc = $can + $can_v;
    if(mysqli_num_rows($ejecf) > 0 ){
        if(mysqli_num_rows($d) > 0 ){

            if( $quitar  >= 0){
     
                $ins_f = "INSERT INTO deuda_1 (nombre_d, descripcion_d, cantidad_d, precio_d, sub_d, fecha, cedula, itbis, fecha_a, abonacion) VALUES ('$nom','$descrip_F','$can','$precio_ff','$res','$fecha','$ced','$coun','$fe','$bona')";
                $ins_ff = ( mysqli_query( $conexion, "INSERT INTO facturacion_venta_1 (codigo, descripcion_f, cantidad_f, precio_f, sub, fecha, itbis, mar_g, nofactura) VALUES (' $codigo_f','$descrip_F + $deu','$can','$precio_ff','0','$fecha','$coun','$margen_f','$numero_aleatorio')"));
                $enviar = mysqli_query($conexion, $ins_f);
                $quitar = $can_f - $can;
                $max = mysqli_query($conexion,"UPDATE articulos_v1 SET cantidad = '$quitar', cantidad_v = '$cc' WHERE codigo = '$codigo_f' " );
                echo'<div id="green" >  Articulo Agregado </div> ';        
            }else{
                echo' <div id=RED>  Agotada cantidad ('.$can_f.')  </div>';
            }
        }else{
            echo'<div style="color:white;  background:red; padding:10px 15px; text-align:center; " > Cedula o Nombre Erroneo</div>  ';
        }
    }else{
        echo'<div style="color:white;  background:red; padding:10px 15px; text-align:center; " > Codigo Erroneo</div> ';
    }
     }
 }

?>