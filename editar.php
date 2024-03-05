<?php
session_start();
if(empty($_SESSION["id"]) or $_SESSION["roles"] == 2 ){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Editar</title>
</head>
<body>




<?php           
        include 'conexion_2.php';
            $id = $_GET['id'];     
            $ed_cl = "SELECT * FROM articulos_v1 WHERE id_articulo ='$id'";
            $ejecut = mysqli_query($conexion, $ed_cl);

            $filas = mysqli_fetch_assoc($ejecut);
                $cc = $filas['codigo'];
                $dd = $filas['descripcion'];
                $cct = $filas['cantidad'];
                $uu = $filas['unidad'];
                $ppc = $filas['precio_c'];
                $pp = $filas['cantidad_v'];
                $ppv = $filas['precio_v'];
                $mmg = $filas['margen_g'];
                $ccs = $filas['compra_p_s'];
                $vvp = $filas['venta_p_n']; 
        ?>
    
    <div class="agre">
        <form action="" method="post">
            <div class="agre_2">
                <div class="mover"><a href="administracion.php"><h2>X</h2></a></div>
                <h1>EDITAR</h1>
                <?php
                include 'editar2.php';
                ?>
    

                <label for="codigo" >Codigo:</label>
                <input  id="cd" class="ipp" type="text" name="codigo" value="<?php echo $cc ?>">
                <label for="descripcion" >Descripcion:</label>
                <input  id="dc" type="text" name="descripcion" value="<?php echo $dd ?>">
                <label for="cantidad" >Cantidad:</label>
                <input  id="ct"  type="text" name="cantidad" value="<?php echo $cct ?>">
                <label for="unidad" >Unidad:</label>
                <input  id="un" type="text" name="unidad" value="<?php echo $uu ?>">
                <label for="Precio_compra" >Precio_Compra:</label>
                <input  id="pc"  type="text" name="precio_compra" value="<?php echo $ppc ?>">
                <label for="porcentage" >Cantidad_venta:</label>
                <input  id="pc" type="text" name="cantidad_v" value="<?php echo $pp ?>">
                <label for="precio_venta" >Precio_Venta:</label>
                <input  id="pv"  type="text" name="precio_venta" value="<?php echo $ppv ?>">
                <label for="margen_ganancia" >Margen_Ganancia:</label>
                <input  id="mg" type="text" name="margen_ganancia" value="<?php echo $mmg ?>">
                <label for="compra_suplidor" >Compra_Prod_Suplidor:</label>
                <input  id="cs" type="text" name="compra_suplidor" value="<?php echo $ccs ?>">
                <label for="venta_producto" >Venta_Prod_negocio:</label>
                <input  id="vp" type="text" name="venta_producto" value="<?php echo $vvp ?>">


                <button  name="edid" >Editar</button>
            </div>
            </form>
        </div>

</body>
</html>