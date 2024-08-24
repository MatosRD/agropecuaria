<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>nueva contraseña</title>
</head>
<body >
    <div class="nueva"  style="background:#f4f4f4;">
        <div class="nuev">
    
            <h1 style="margin-top: 20px;margin-bottom:10px; font-family: Arial, Helvetica, sans-serif; font-weight: 800;">Nueva Contraseña</h1>
            
            <?php
            include 'conexion.php';
            
            $id = $_GET['id'];
            if(!empty(['CON'])){
                if(!empty($_POST['clave']) AND !empty($_POST['clave2']) ){
                    $clave = $_POST['clave'];
                    $conf = $_POST['clave2'];
    
                    if($clave == $conf){
                        $go = mysqli_query($conexion, "UPDATE pratica SET clave = '$clave', intentos = '0'  WHERE usuario = '$id' ");
                        header("Location: login.php");
                    }else{
                        echo "<div style ='color:red; margin-bottom:10px;'>Contraseña no coincide</div>";
                    }
                }
            }
            ?>
            <form action="" method="post">
                <label for="">Contraseña Nueva</label>
                <input type="password" name="clave">
                <label for=""> Confirmar contraseña</label>
                <input type="password" name="clave2">
                <button id="CON"> confirmar</button>
            </form>

        </div>
    </div>
</body>
</html>