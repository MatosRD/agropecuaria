<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
  


<?php

include 'conexion_2.php';

    $e = $_GET['val'];
    $itbs = 54;
    $id_e = $_GET['id'];

    $buse = "SELECT * FROM facturacion_1 WHERE id_factura = '$id_e'";
    $ejece = mysqli_query($conexion, $buse);
    $filas_f = mysqli_fetch_assoc($ejece);
        $codi_e = $filas_f['codigo'];
        $cantidad_e = $filas_f['cantidad_f'];
        $pre = $filas_f['precio_f'];        
        $rett = $pre * $e + $itbs;
        $ins_f = "UPDATE facturacion_1 SET cantidad_f = '$e ', sub = '$rett' WHERE id_factura = '$id_e'";


    $enviar = mysqli_query($conexion, $ins_f);
   


   
   $articol = ("SELECT * FROM articulos_v1 WHERE codigo = '$codi_e'");
    $ejece_e = mysqli_query($conexion, $articol);
    $filas_e = mysqli_fetch_assoc($ejece_e);
        $codi_a = $filas_e['codigo'];
        $cantidad_a = $filas_e['cantidad'];
   
    

    $tul = $e - 1 ;        
    $estado = $cantidad_a - $tul;
    $end = mysqli_query($conexion,"UPDATE articulos_v1 set cantidad = $estado WHERE codigo = $codi_e ");
   
    header('location:vendedor.php');



?>

  
</body>
</html>