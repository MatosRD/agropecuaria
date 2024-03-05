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
    <link rel="shortcut icon" href="logonew1.png" />
    <title>Factura</title>
</head>
<body>
    
    <div class="container">
        <div class="nav">
            <div class="nav_sub">
                <ul>
                <li><a href="deuda1.php">CxC❌</a></li>
            <li><a href="Datos.php">Cuadre📊</a></li>
            <li><a href="factura_A.php">Facturas📈</a></li>
            <li><a href="agregar.php">Agregar📋</a></li>
            <li><a href="administracion.php">Inicio🏠</a></li>
            <li><a href="cerrar.php"><img src="salir.png" alt="" id="fifa" style="width: 35px;"></a></li>
        </ul>
        
            </div>
        </div>
        
        <a href="cerrar.php"><img src="salir_1.png" alt="" id="RR" style="width: 35px;" ></a>

        <div class="menu">
                <img src="menu.png" id="icono_menu" style="z-index: 100;" >
            </div>
        <div class="linea3">
            <h1>Factura</h1>
        </div>

        <div class="mostrar">
            <button><a href="">Mostrardo las ultimas 25 Factura</a></button>
            <button><a href="todo.php">Mostrar todas las Factura</a></button>
        </div>
          
            
          <div class="fac">
                <table class="um" >
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Descripcion</ht>
                            <th>Cantidad</ht>
                            <th>Precio</th>
                            <th>Fecha</th>
                            <th>Itbis</th>
                            <th>Subtotal</ht>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                include 'conexion_2.php';
                
                $mostrar_a = "SELECT *
                FROM facturacion_venta_1
               ORDER BY id_factura_venta DESC
               LIMIT 25";
                $total = mysqli_query($conexion, $mostrar_a)
                ?>
                <?php  while($fila = mysqli_fetch_assoc($total)) { ?>

                    <tr class="no1">
                    <td><?php echo $fila['codigo'] ?> </td>
                    <td><?php echo $fila['descripcion_f'] ?> </td>
                    <td><?php echo $fila['cantidad_f'] ?> </td>
                    <td><?php echo $fila['precio_f'] ?> </td>
                    <td><?php echo $fila['fecha'] ?> </td>
                    <td><?php echo $fila['itbis'] ?> </td>
                    <td><?php echo $fila['sub'] ?> </td>

                    </tr>    
                <?php } ?>

                                   
    <script>
        document.getElementById("icono_menu").addEventListener("click", menu_menu);
        function menu_menu(){
            document.querySelector(".nav_sub").classList.toggle("menu_menu")
        }

    </script>     
                    </tbody>
                </table>



</body>
</html>