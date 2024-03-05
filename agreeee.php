<?php

session_start();
if(empty($_SESSION["id"])){
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
        <div class="opc" ><a href="credito.php">X</a></div>
        <h1>Agregar Cliente</h1>
        <?php
        
        include 'agre_client1.php';
        ?>
        <form action="" method="post" >
            <label for="">Nombre</label>
            <input type="text" name="nom_cliente" placeholder="Nombre Cliente" >
            <label for="">cedula</label>
            <input type="text" name="cedula_cliente" placeholder="nombre Cliente" >

            <button id="PP" > Ingresar</button>
        </form>

    </div>
</div>



</body>
</html>