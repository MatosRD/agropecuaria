<?php
session_start();
if(empty($_SESSION["id"]) or $_SESSION["roles"] == 2 ){
    header("location: ../login/login.php");
}

include './../../conexion_DB/Conexion.php';
$id = $_GET['id'];     
$editar_inventario = "SELECT * FROM inventario WHERE id_inventario ='$id'";
$ejecut = mysqli_query($conexion, $editar_inventario);

$filas = mysqli_fetch_assoc($ejecut);
    $codigo = $filas['codigo'];
    $articulo = $filas['articulo'];
    $cantidad = $filas['cantidad'];
    $precio_c = $filas['precio_costo'];
    $precio_v = $filas['precio_venta'];
    $ganancia = $filas['ganancia'];
?>
<style>
.agre form .agre_2 input,label{
    margin: 0px 40px 0px 40px;
   

}
.agre form .agre_2 input{
    padding-left: 10px;
    padding: 15px 10px;
}

</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../style/style.css">
    <title>Editar</title>
</head>
<body>
    <div class="agre">
        <form action=""  method="post" enctype="multipart/form-data">
            <div class="agre_2" style="height: auto;">
                <div class="mover"><a href="./../inicio_administrador.php"><h2>X</h2></a></div>
                <h1>EDITAR</h1>
                <?php
                include 'edicion.php';
                ?>
    
                <label for="imagen">Selecciona una imagen:</label>
                <input type="file" name="imagen">
                <label for="codigo" >Codigo:</label>
                <input  id="cd" class="ipp" type="text" name="codigo" value="<?php echo $codigo ?>">
                <label for="descripcion" >Articulo:</label>
                <input  id="dc" type="text" name="articulo" value="<?php echo $articulo ?>">
                <label for="cantidad" >Cantidad:</label>
                <input  id="ct"  type="text" name="cantidad" value="<?php echo $cantidad ?>">
                <label for="unidad" >Precio Costo:</label>
                <input  id="pc"  type="text" name="precio_c" value="<?php echo $precio_c ?>">
                <label for="Precio_compra" >Precio Venta:</label>
                <input  id="pc"  type="text" name="Precio_v" value="<?php echo $precio_v ?>">
                <label for="Precio_compra" >Ganancia:</label>
                <input  id="pc"  type="text" name="ganancia" value="<?php echo $ganancia ?>">

                <button  name="edid" style="margin-bottom: 20px;">Editar</button>
            </div>
            </form>
        </div>

</body>
</html>