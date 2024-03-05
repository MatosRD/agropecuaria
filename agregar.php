<?php
session_start();
if(empty($_SESSION["id"]) or $_SESSION["roles"] == 2){
    header("location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>agregar</title>
</head>
<body>


    <div class="agre">
        <form action="" method="post">
            <div class="agre_2">
                <div class="mover"><a href="administracion.php"><h2>X</h2></a></div>
                <h1>agregar</h1>

                <?php
                    include 'conexion_2.php';
                    include 'agreg.php';
                ?>

                <label for="codigo" >Codigo:</label>
                <input  id="cd" class="ipp" type="text" name="codigo" placeholder="  Escribir codigo" required>
                <label for="descripcion" >Descripcion:</label>
                <input  id="dc" type="text" name="descripcion" placeholder="  Escribir Descripcion" required>
                <label for="cantidad" >Cantidad:</label>
                <input  id="ct"  type="text" name="cantidad" placeholder="  Escribir Cantidad" required>
                <label for="unidad" >Unidad:</label>
                <input  id="un" type="text" name="unidad" placeholder="  Escribir Unidad" required>
                <label for="Precio_compra" >Precio_Compra:</label>
                <input  id="pc"  type="text" name="precio_compra" placeholder="  Escribir Precio Compra" required>
                <label for="porcentage" >Cantidad_vendidas:</label>
                <input  id="pc" type="text" name="cantidad_v" placeholder="  Escribir Cantidad_v" value="0" required>
                <label for="precio_venta" >Precio_Venta:</label>
                <input  id="pv"  type="text" name="precio_venta" placeholder="  Escribir Precio Venta" required>
                <label for="margen_ganancia" >Margen_Ganancia:</label>
                <input  id="mg" type="text" name="margen_ganancia" placeholder="  Escribir Margen Ganancia" required>
                <label for="compra_suplidor" >Compra_Prod_Suplidor:</label>
                <input  id="cs" type="text" name="compra_suplidor" placeholder="  Escribir compra suplidor" required>
                <label for="venta_producto" >Venta_Prod_negocio:</label>
                <input  id="vp" type="text" name="venta_producto" placeholder="  Escribir Venta_Prod_negocio" required>


                <button  id="butagre" >Entrar</button>
            </div>
            </form>
        </div>


    
</body>
</html>