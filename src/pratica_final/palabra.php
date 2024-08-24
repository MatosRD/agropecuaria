<?php
    include 'conexion.php';
    $id = $_GET['nombre'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Palabra Clave</title>
</head>
<body >
    <div class="pal" style="background:#f4f4f4;">
        <div class="pal_2">
            <img src="perfil-del-usuario.png" alt="" style="width: 100px; margin-top:20px;">
            <?php
                if(!empty(['XD'])){
                    if(!empty($_POST['palabra'])){
                        $palabra = $_POST['palabra'];
                        $pin = mysqli_query($conexion, "SELECT * FROM pratica WHERE palabra = '$palabra' and usuario = '$id'");
                        if(mysqli_num_rows($pin) > 0){
                            $pin = mysqli_query($conexion, "UPDATE pratica SET estado = 'activo' WHERE  usuario = '$id'");
                            header("Location: nueva.php?id=$id");
                        }else{
                            echo "palabra incorrecta";
                        }
                    }
                }
            
            ?>
            <form action="" method="post" style="margin-bottom: 20px; margin-top:20px;">
                <label for="" style="font-size: 24px;">Ingrese Palabra Clave</label>
                <input type="text" name="palabra">
                <button id="XD">Enviar</button>
            </form>
        </div>
    </div>
</body>
</html>