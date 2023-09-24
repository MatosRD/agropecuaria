<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="logonew1.png" />
    <title>LOGIN</title>
</head>
<body>
    <div class="log">
    <form action="" method="post">
        <div class="log_2">

            <img src="logonew.png" alt="">


            <?php
            include 'conexion.php';
            include 'entrar.php';
            ?>


            <label for="USER" >Usuario:</label>
            <input  id="user" class="ipp" type="text" name="user" placeholder="Escribir Usuario">
            <label for="CONTRA" >Contraseña:</label>
            <input  id="clave" type="password" name="contraa" placeholder="Escribir Contraseña">
            <button  id="buton" >Entrar</button>
        </div>
        </form>
    </div>
</body>
</html>