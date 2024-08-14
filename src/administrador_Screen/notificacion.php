<?php 
session_start();
if(empty($_SESSION["id"]) or $_SESSION["roles"] == 2 ){
    header("location: ../login/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/style.css">
    <title>Notificacion</title>
</head>
<body>

<header class="main-header">
<label for="btn-nav" class="btn-nav"  ><img src="./../img/menu.png" alt="" style="width: 20px; "></label>
<input type="checkbox" id="btn-nav">
        <nav>
            <ul class="navigation">
                <li> <a href="inicio_administrador.php"> <img src="./../img/hogar.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Inventario</span></a></li>
                <li> <a href="pedidos.php"><img src="./../img/pedido.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Pedido</span></a></li>
                <li> <a href="cliente.php"><img src="./../img/cliente.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Cliente</span></a></li>
                <li> <a href="reportes.php"><img src="./../img/informe.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Reporte</span></a></li>
                <li> <a href=""><img src="./../img/grafico.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Grafico</span></a></li>
                <li> <a href="consulta.php"><img src="./../img/vendedor.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Actividad</span></a></li>
                <li> <a href="usuario.php"><img src="./../img/perfil-del-usuario.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Usuarios</span></a></li>
                <li> <a href="cerrar.php"><img src="./../img/salir.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Salir</span></a></li>
            </ul>
        </nav>
    </header>

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