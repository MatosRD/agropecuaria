<?php

include './../../conexion_DB/Conexion.php';

$id = $_GET['id'];     
$editar_inventario = "SELECT * FROM login_v1 WHERE id_login ='$id'";
$ejecut = mysqli_query($conexion, $editar_inventario);

$filas = mysqli_fetch_assoc($ejecut);
    $vendedor = $filas['usuario'];
    $clave = $filas['clave'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agregar</title>
    <link rel="stylesheet" href="./../../style/style.css">
</head>
<body>

<style>
  .agre form .agre_2 label,input{
  margin: 0px 30px 0px 30px;
} .agre form .agre_2 input{
    padding-left: 10px;
    height: 30px;
}

</style>
    
<div class="agre">
        <form action="" method="post">
            <div class="agre_2">
                <div class="mover"><a href="./../usuario.php"><h2>X</h2></a></div>
                <h1>EDITAR</h1>
                <?php
                include 'edita_v.php';
                ?>
    

                <label for="ven" >Vendedor:</label>
                <input  id="cd" class="ipp" type="text" name="vendedor" value="<?php echo $vendedor ?>">
                <label for="descripcion" >Clave:</label>
                <input  id="dc" type="text" name="clave" value="<?php echo $clave ?>">
                <button  name="edid" >Editar</button>
            </div>
            </form>
        </div>

</body>
</html>