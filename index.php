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





            <label for="USER" >Usuario:</label>
            <input  id="user" class="ipp" type="text" name="user" placeholder="Escribir Usuario">
            <label for="CONTRA" >Contraseña:</label>
            <input  id="clave" type="password" name="contraa" placeholder="Escribir Contraseña">
            <button  name="buton" >Entrar</button>
        </div>
        </form>
    </div>
</body>
</html>


<?php
session_start();
if(isset($_SESSION['nombre'])){
    header("location: administrador.php");
}

if(isset($_POST['buton'])){
    include 'conexion_2.php';

    $name = $_POST['user'];
    $clave  = $_POST['contraa'];

    $query = mysqli_query($conexion, "SELECT * FROM usuarios_1 WHERE usuario = '$name' and contrasena = '$clave' ");
    $ff = mysqli_num_rows($query);


    if(!isset($_SESSION['nombre'])){
    
    if($ff = 1){
        $_SESSION['nombre'] = $cargo ;
        header("location: administrador.php");
    }


    }
}


?>



<?php
session_start();

if(isset($_SESSION['nombre'])){

}else{
    header("location: index.php");
}

?>