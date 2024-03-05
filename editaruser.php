<?php
session_start();
if(empty($_SESSION["id"]) or $_SESSION["roles"] == 2 ){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Editar</title>
</head>
<body>




<?php           
        include 'conexion_2.php';
            $id = $_GET['id'];     
            $ed_cl = "SELECT * FROM usuarios_1 WHERE id_usuarios ='$id'";
            $ejecut = mysqli_query($conexion, $ed_cl);

            $filas = mysqli_fetch_assoc($ejecut);
                $cc = $filas['usuario'];
                $dd = $filas['contrasena'];
                $cct = $filas['cargo'];
                
        ?>
    
    <div class="agre">
        <form action="" method="post">
            <div class="agre_2">
                <div class="mover"><a href="user.php"><h2>X</h2></a></div>
                <h1>EDITAR</h1>
                <?php
                include 'd.php';
                ?>
    

                <label for="codigo" >Usuario:</label>
                <input  id="cd" class="ipp" type="text" name="usuario" value="<?php echo $cc ?>">
                <label for="descripcion" >contraseña:</label>
                <input  id="dc" type="text" name="clave" value="<?php echo $dd ?>">
                <label for="cantidad" >Cargo:</label>
                <input  id="ct"  type="text" name="cargo" value="<?php echo $cct ?>">


                <button  name="edid" >Editar</button>
            </div>
            </form>
        </div>

</body>
</html>