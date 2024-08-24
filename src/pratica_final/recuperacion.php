<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Recuperacion</title>
</head>
<body >
    <div class="recp" style="background:#f4f4f4;">
        <div class="recp_1">
            <?php $id = $_GET['nombre']; ?>
            <h1>Modo De Recuperacion</h1>
            <button style="background:blue;">
                <a href="correo.php">Correo</a>
            </button>
            
            <button style="margin-top: 20px; background:rgb(91, 16, 156);" >
                <?php  echo "<a href='palabra.php?nombre=".$id."'>Palabra Clave</a> "?>
            </button>
              
        </div>
    </div>
</body>
</html>