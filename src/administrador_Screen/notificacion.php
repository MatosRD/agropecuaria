<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/style.css">
    <title>Document</title>
</head>
<body>

<div class="full">
    <h1>Notificacion</h1>
    <p>Producto por agotarce</p>
</div>

<div class="tabl" >
        <table style="width: 70%;">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>cantidad</th>
        
                </tr>
            </thead>
            <tbody>
                <?php
                
                include './../conexion_DB/Conexion.php';
                
                $mostrar_inventario = "SELECT * FROM inventario WHERE cantidad <= '10' ORDER BY cantidad ASC ";
                $busqueda = mysqli_query($conexion, $mostrar_inventario)
                ?>
                <?php  while($fila = mysqli_fetch_assoc($busqueda)) { ?>

                    <tr class="no1">
                        <td><?php echo $fila['articulo'] ?> </td>
                        <td ><?php echo $fila['cantidad'] ?> </td>
                    </tr>    
                <?php } ?>

                <?php 

    ?>       

                            
            </tbody>
        </table>

    </div>
</body>
</html>