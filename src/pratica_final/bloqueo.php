<?php

$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bloqueo</title>
</head>
<body >
    

    <div class="center"  style="background:#f4f4f4;">
        <div class="center2">
            <img src="perfil-del-usuario.png" alt="" style="width:160px;">
            <h1 style="margin-top: 20px; ">CUENTA BLOQUEADA</h1>
            <?php echo $id ?>
            <p style="margin-top: 20px;">La cuenta Fue Bloqueda Se Consumio El Maximo De Intento <br>
                ¿Desea Recuperar?
            </p>
            <button style="margin-top: 20px;">
            <?php  echo "<a href='recuperacion.php?nombre=".$id."'>Recuperar</a> "?>
            </button>

        </div>
    </div>


</body>
</html>