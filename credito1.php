<?php

include 'conexion_2.php';

if(!empty(['MMG'])){
    if(!empty($_POST['bu']) ){
        $dd = $_POST['bu'];
        $ff = $_POST['mu'];
        $ced = $_POST['cedu'];
        $nom = $_POST['nombre'];
        $itbis = $_POST['country'];
        
        
        
     
        
    
    $d = mysqli_query($conexion, "SELECT * FROM deuda_1 WHERE nombre_d = '$nom' and cedula = '$ced' ");    
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

    if(mysqli_num_rows($d) > 0 ){

       if( $quitar  >= 0){

    $ins_f = "INSERT INTO deuda_1 (nombre_d, descripcion_d, cantidad_d, precio_d, sub_d, fecha, cedula, itbis) VALUES ('$nom','$descrip_F','$dd','$precio_ff','$res','$fecha','$ced','$itbis')";
    $enviar = mysqli_query($conexion, $ins_f);


    $quitar = $can_f - $dd;

    $max = mysqli_query($conexion,"UPDATE articulos_v1 SET cantidad = '$quitar' WHERE codigo = '$codigo_f' " );
        
        echo'<div id="green" >  Credito agregado </div> ';
        header("location: credito.php");

    }else{
        echo' <div id=RED>  Agotada cantidad ('.$can_f.')  </div>';
    }
    }else{
        echo'<div style="color:white;  background:red; " > Cedula o Nombre Erroneo</div>  ';
    }
}
}
?>



