<?php
session_start();
include '../conexion_DB/Conexion.php';

if(!empty(['buton_login'])){
    if(!empty($_POST['usuario']) and !empty($_POST['clave'])){
        
        $usuario = $_POST['usuario'];
        $contra = $_POST['clave'];
        $buscar_login = mysqli_query($conexion, "SELECT * FROM login_v1 WHERE usuario = '$usuario' and clave = '$contra'");
    
        if($datos = $buscar_login-> fetch_object()){
            $_SESSION["id"] = $datos-> id_login;
            $_SESSION["nombres"] = $datos-> usuario;
            $_SESSION["roles"] = $datos-> rol;
            $_SESSION["estado"] = $datos-> estado;
            $nombre =  $_SESSION["nombres"];
            

            if( $_SESSION["roles"] == 1 ){
                header("location: ../administrador_Screen/inicio_administrador.php");
            }if( $_SESSION["roles"] == 2){
                date_default_timezone_set('America/Santo_Domingo'); 
                $fecha_y_hora = date("d-m-Y");
                $fecha = date('H:i');
                $registro = mysqli_query($conexion, "INSERT INTO vista (nombre, inicio, fecha) VALUES ('$nombre','$fecha_y_hora','$fecha') ");
                
                $buscar_vendedor = mysqli_query($conexion, "SELECT * FROM vista WHERE fecha = '$fecha'");
                if($datos_vendedor = $buscar_vendedor-> fetch_object()){
                    $_SESSION["id_vendedor"] = $datos_vendedor-> id_vista;
                    header("location: ../vendedor_Screen/inicio_vendedor.php");
                }
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
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" href="logonew1.png" />
    <title>LOGIN</title>
</head>
<body>
    <div class="log">
            <div class="log_2">
            <img src="../img/logo.jpg" alt="">
            <form action="" method="post">
            <label for="USER" >Usuario:</label>
            <input  id="user" class="ipp" type="text" name="usuario" placeholder="Escribir Usuario">
            <label for="CONTRA" >Contraseña:</label>
            <input  id="clave" type="password" name="clave" placeholder="Escribir Contraseña">
            <button  id="buton_login" >Entrar</button>
            </form>
        </div>
        
    </div>
</body>
</html>