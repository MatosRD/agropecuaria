<?php
session_start();
if(empty($_SESSION["id"]) or $_SESSION["roles"] == 2 ){
    header("location: ../login/login.php");
}
include './../../conexion_DB/Conexion.php';

$id = $_GET['id'];     
$editar_inventario = "SELECT * FROM cliente WHERE id_cliente ='$id'";
$ejecut = mysqli_query($conexion, $editar_inventario);

$filas = mysqli_fetch_assoc($ejecut);
    $cliente = $filas['nombre'];
    $direccion = $filas['direccion'];
    $latitud = $filas['longitud'];
    $logintud = $filas['latitud'];
?>

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
        <form action="" method="post">
            <div class="agre_2">
                <div class="mover"><a href="./../cliente.php"><h2>X</h2></a></div>
                <h1>EDITAR</h1>
                <?php
                include 'eliminar_editar/edicion_1.php';
                ?>
    

                <label for="codigo" >Cliente:</label>
                <input  id="cd" class="ipp" type="text" name="cliente" value="<?php echo $cliente ?>">
                <label for="descripcion" >Direccion:</label>
                <input  id="dc" type="text" name="direccion" value="<?php echo $direccion ?>">
                <label for="cantidad" >Longitud:</label>
                <input  id="ct"  type="text" name="logintud" value="<?php echo $latitud ?>">
                <label for="unidad" >Latitud:</label>
                <input  id="pc"  type="text" name="latitud" value="<?php echo $logintud ?>">
                <button  name="edid" >Editar</button>
            </div>
            </form>
        </div>

</body>
</html>