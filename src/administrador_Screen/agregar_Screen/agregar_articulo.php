<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../style/style.css">
    <title>Agregar Articulo</title>
</head>
<body style="background: white;" >
    
<div class="justc" >
    <div class="justc1" style="height: 700px; margin-bottom:40px; ">
        <div class="opc" ><a href="./../inicio_administrador.php">X</a></div>
        <h1>Agregar</h1>
        <?php
        include 'logica_agregar.php';
        ?>
        <form action="" method="post" >
            <label for="">Codigo</label>
            <input type="text" name="codigo" placeholder="Codigo" >
            <label for="">Articulo</label>
            <input type="text" name="articulo" placeholder="Articulo" >
            <label for="">Cantidad</label>
            <input type="text" name="cantidad" placeholder="Cantidad" >
            <label for="">Precio Costo</label>
            <input type="text" name="costo" placeholder="costo" > 
            <label for="">Precio Venta</label>
            <input type="text" name="venta" placeholder="Venta" > 
            <label for="">Ganancia</label>
            <input type="text" name="ganancia" placeholder="ganancia" > 

            <button id="PP" > Agregar</button>
        </form>

    </div>
</div>



</body>
</html>