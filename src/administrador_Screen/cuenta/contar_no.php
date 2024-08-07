<?php
include './../conexion_DB/Conexion.php';

if(!empty(['contar'])){
    $contar = $_POST['contar'];
    if($contar > 0){
        $actualizar = mysqli_query($conexion,"UPDATE pedidos_c SET descuento = '$contar' WHERE ");
    }

}



?>