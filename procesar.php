<?php

include 'conexion_2.php';



$aleatorio = $_GET['nun'];


$buscar = mysqli_query($conexion,"SELECT * FROM facturacion_1");
$buscar2 = mysqli_query($conexion,"SELECT * FROM facturacion_venta_1");

if(mysqli_fetch_assoc($buscar) >= 1){
    $ff = mysqli_query($conexion,"UPDATE facturacion_1 SET nofactura = ' $aleatorio '");
    $ff = mysqli_query($conexion,"INSERT INTO facturacion_venta_1  SELECT * FROM facturacion_1");
    $aa = mysqli_query($conexion,"DELETE FROM facturacion_1");
    

    
   
}else{
    header('location: vendedor.php');
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ELEGIR</title>
</head>
<body background="#ddd" >
    
<div class="elecion">
    <div class="elecion1">
        <h1>DESEA IMPRIMIR FACTULA</h1>
<div class="a">
<?php  echo' <a  style="background: green;" id="ag" href="as.php?nun='.$aleatorio.'" target="_blank"  >SI</a> ';  
    echo '<a href="vendedor.php"  style="background: red;" >NO</a>'; ?>
 
</div>
           <div class="na" > 
         <a href="vendedor.php">Volver</a>
            </div>
    </div>

</div>

<?php



?>
</body>
</html>