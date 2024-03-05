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
            $ed_cl = "SELECT * FROM deuda_1 WHERE id_deuda ='$id'";
            $ejecut = mysqli_query($conexion, $ed_cl);

            $filas = mysqli_fetch_assoc($ejecut);
        
                $cct = $filas['cantidad_d'];
         
            
        ?>
    
    <div class="agre">
        <form action="" method="post">
            <div class="agre_2">
                <div class="mover"><a href="deuda1.php"><h2>X</h2></a></div>
                <h1>EDITAR</h1>
                <?php
                include 'editar_d2.php';
                ?>
    
               
                <label for="cantidad" >Cantidad:</label>
                <input  id="ct"  type="text" name="cantidad" value="<?php echo $cct ?>">
    

                <button  name="edid" >Editar</button>
            </div>
            </form>
        </div>

</body>
</html>