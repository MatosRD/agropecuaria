<?php

session_start();
if(empty($_SESSION["id"]) or $_SESSION["roles"] == 2 ){
    header("location: login.php");
}
include 'conexion_2.php';






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Agregar Clientes</title>
</head>
<body style="background: white;" >
    
<div class="justc">
    <div class="justc1">
        <div class="opc" ><a href="deuda1.php">X</a></div>
        <h1>Agregar Articulos</h1>
        <?php
        error_reporting(0);
        include 'agendi.php';
        ?>
        <form action="" method="post" >
            <label for="">Nombre</label>
            <input type="text" name="nom_cliente" placeholder="Nombre Cliente" >
            <label for="">cedula</label>
            <input type="text" name="cedula_cliente" placeholder="CedulaCliente" >
            <label for="">codigo</label>
            <input type="text" name="codigo_cliente" placeholder="Codigo Producto" >
           <br>
            <label for="country"> Itbis
            <select id="country" name="country">
            <option value="0">0.00</option>
            <option value="54">18%</option>
            </select> <br>
            <br>
            <label for="">cantidad</label>
            <input type="text" name="cantidad" placeholder="Cantidad Producto" > 

            <button id="PP" > Ingresar</button>
        </form>

    </div>
</div>



</body>
</html>