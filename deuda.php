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
    <script> function confirmar(){
    return confirm('¿Estas seguro de eliminar los datos?');
    }</script>
    <title>Deuda</title>
</head>
<body>
    


<div class="container">
<div class="nav">
    <div class="nav_sub">
        <ul>
        <li><a href="deuda1.php">CxC❌</a></li>
            <li><a href="Datos.php">Datos📊</a></li>
            <li><a href="factura_A.php">Facturas📈</a></li>
            <li><a href="agregar.php">Agregar📋</a></li>
            <li><a href="administracion.php">Inicio🏠</a></li>
            <li><a href="cerrar.php"><img src="salir.png" alt="" id="fifa" style="width: 35px;"></a></li>
        </ul>
    </div>
</div>
<a href="cerrar.php"><img src="salir.png" alt="" id="RR" style="width: 35px;" ></a>
        
        <div class="menu">
                <img src="menu.png" id="icono_menu">
            </div>

<div class="at">
    <a href="deuda1.php">Atras</a>
</div>

<div class="fac">
        <table  >
            <thead>
                <tr>
                   
                    <th>Descripcion</th>
                    <th>Cedula</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Itbis</th>
                    <th>Sub Total</th>
                    <th>Fecha</th>
                    <th>Abonacion</th>
                    <th>Accion</th>

                </tr>
            </thead>
            <tbody>


            
                <?php
                include 'conexion_2.php';

                $bg = $_GET['id'];
                $mostrar_a = "SELECT  * FROM deuda_1 WHERE nombre_d = '$bg'  ";
                $total = mysqli_query($conexion, $mostrar_a);
                
                while($fila = mysqli_fetch_assoc($total)) {  ?>
                <tr>
                    
                    <form action="" method="post">
                    
                    <td><?php echo $fila['descripcion_d']  ?> </td>
                    <td><?php echo $fila['cedula']  ?></td>
                    <td><?php echo number_format ($fila['precio_d'],2);  ?></td>
                    <td><?php echo $fila['cantidad_d']  ?></td>
                    <td><?php echo $fila['itbis']  ?></td>
                    <td><?php echo number_format ($fila['sub_d'],2);  ?></td>
                    <td><?php echo $fila['fecha']  ?></td>
                    <td><?php echo number_format ($fila['abonacion'],2);  ?></td>
                 
                
                    <td>
                        <button style="margin-top: 20px;" type="button" id="ea"><?php echo"<a href='editar_d.php?id=".$fila['id_deuda']." '
                        >Editar</a>"; ?></button>            
                    
                    </td>

                    
                    
                    
                    
                    <?php } ?>
                </tr>   
                 
           
       
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


</body>
</html>