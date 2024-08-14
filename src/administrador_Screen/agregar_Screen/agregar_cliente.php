<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../style/style.css">
    <title>Agregar cliente</title>
</head>
<body style="background: white;" >
    
<div class="justc">
    <div class="justc1"style="height: 530px;">
        <div class="opc" ><a href="./../cliente.php">X</a></div>
        <h1>Agregar cliente</h1>
        <?php
        include 'logica_agregar_1.php';
        ?>
        <form action="" method="post"  >
            <label for="">Cliente</label>
            <input type="text" name="cliente" placeholder="Cliente" >
            <label for="">Direccion</label>
            <input type="text" name="direccion" placeholder="Direccion" >
            <label for="">Dia</label>
            <input type="text" name="dia" placeholder="Direccion" >
            <label for="">Longitud</label>
            <input type="text" name="longitud" placeholder="Longitud" >
            <label for="">Latitud</label>
            <input type="text" name="latitud" placeholder="Latitud" > 
            <button id="PP" > Agregar</button>
        </form>

    </div>
</div>



</body>
</html>