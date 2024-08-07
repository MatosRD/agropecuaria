<?php

include './../../conexion_DB/Conexion.php';

$id = $_GET['id'];     

if(!empty(['contar'])){
    if(!empty($_POST['desc'])){
       $contar = $_POST['desc'];
       
                $buscar = "SELECT * FROM pedidos_c WHERE  id_pedidos = '$id'";
                $busqueda = mysqli_query($conexion, $buscar);
                while($fila = mysqli_fetch_assoc($busqueda)){
                    $total = $fila['sub_total'];
                }
                 
                $tt = $total - $contar;
           
               $actualizar = mysqli_query($conexion,"UPDATE pedidos_c SET descuento = $contar, total = '$tt' WHERE id_pedidos = '$id' ");
               header("Location: ./../pedidos.php");
    }                  
   }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../style/style.css">
    <title>Document</title>
</head>
<body>
        <div class="centrar">
            <form action="" method="post" >
                <input type="text" name="desc" placeholder="Descuento">
                <button id="contar">Descontar</button>
            </form>
        </div>         
</body>
</html>