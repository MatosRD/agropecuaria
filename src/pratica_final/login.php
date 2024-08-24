<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body class="fondo" >


    <div class="pack">
        <form action="" method="post">
            <h1>OYM</h1>
            <div class="conter">
                <?php include 'logica.php' ?>
                <input type="text" name="usuario" placeholder="Usuario" >
                <input type="password" name="clave" placeholder="password" style="margin-top: 10px;">
                <button id="OK" style="margin-top: 10px; "> Login</button>
            </div>
        </form>
    </div>
</body>
</html>