<?php
session_start();
include 'conexion_2.php';

if(!empty(['buton'])){
    if(!empty($_POST['user']) and !empty($_POST['contraa'])){
    $usuarios_v = $_POST['user'];
    $contra_v = $_POST['contraa'];
    $buscar = mysqli_query($conexion,"SELECT * FROM usuarios_1 WHERE usuario = '$usuarios_v' and contrasena = '$contra_v'");
     if($datos = $buscar-> fetch_object()){
            $_SESSION["id"] = $datos-> id_usuarios;
            $_SESSION["nombres"] = $datos-> cargo;
            $_SESSION["roles"] = $datos-> rol;
            if( $_SESSION["roles"] == 1 ){
                header("location: administracion.php");
            }if( $_SESSION["roles"] == 2){
                header("location: vendedor.php");
            }
        }
    }
}
?>

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
            <div class="log_2">
            <img src="logonew.png" alt="">
            <form action="" method="post">
            <label for="USER" >Usuario:</label>
            <input  id="user" class="ipp" type="text" name="user" placeholder="Escribir Usuario">
            <label for="CONTRA" >Contraseña:</label>
            <input  id="clave" type="password" name="contraa" placeholder="Escribir Contraseña">
            <button  id="buton" >Entrar</button>
            </form>
        </div>
        
    </div>
</body>
</html>