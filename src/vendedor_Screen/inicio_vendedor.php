<?php


include './../conexion_DB/Conexion.php';
session_start();

$id = $_SESSION["id_vendedor"];
$nombre =  $_SESSION["nombres"];
$numero_aleatorio = rand(100000, 10000000);

// Establece el tiempo máximo de inactividad en segundos (por ejemplo, 600 segundos = 10 minutos)
$max_inactividad = 600;

if (isset($_SESSION['ultima_actividad']) && (time() - $_SESSION['ultima_actividad']) > $max_inactividad) {
    // Si la última actividad fue hace más de $max_inactividad segundos, destruye la sesión
    date_default_timezone_set('America/Santo_Domingo');
    $fecha = date('H:i');
    $registro = mysqli_query($conexion, "UPDATE vista SET cierre = '$fecha' WHERE id_vista = '$id'");
    session_unset();
    session_destroy();
    header("Location: ./../login/login.php");
}




// Actualiza la última actividad
$_SESSION['ultima_actividad'] = time();



// if(!empty(['aa'])){
//     if(!empty($_POST['ejemplo'])){
//         $ja = $_POST['ejemplo'];
//       $sa = mysqli_query($conexion,"INSERT INTO pedidos (cliente) VALUES ('11')");      
//     }
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/style.css">
    <title>Document</title>
</head>

<body>





<div class="cont_ved">
    <div class="center">
    <div class="todo">
    <form action="" method="post">
        <input type="text" name="articulos" placeholder="articulo">
        <button id="aa">Buscar</button>
    </form>
    <div class="ta">
    <table >
        <thead>
            <tr>
                <th style="background: orange; color:black; ">Producto</th>
                <th style="background: orange; color:black;">Cantidad</th>
                <th style="background: orange; color:black;">precio</th>
                <th style="background: orange; color:black; ">accion</th>
            </tr>
        </thead>
        <tbody >


            <?php
            // include 'inicio_vendedor.php';
            include './../vendedor_Screen/buscar/buscar_articulo.php';
            if (!empty("aa")) {
                if (!empty($_POST['articulos'])) {
                    $articulo = $_POST['articulos'];
                    $sentencia = "SELECT * FROM inventario WHERE articulo like '%$articulo%' or codigo = '$articulo' ";
                    $busqueda = mysqli_query($conexion, $sentencia);
                    if (mysqli_num_rows($busqueda) > 0) {
                        echo '<style>
                    </style>';

                        echo '<a  style="text-decoration: none; z-index:10; display:flex;" href="inicio_vendedor.php"><button  style=" color: white; background: blue;
                        padding: 8px 15px; border:none; border-radius:10px;  margin-left: 5px; cursor: pointer; "> Limpiar pantalla</button></a>';
                        while ($fila = mysqli_fetch_assoc($busqueda)) {
                            echo '<tr class="no2">'; ?>
                            <form action="" method="post"> <?php
                                $mx = $codigo = $fila['codigo'];
                                 ?> <input type="hidden" name="codigo" value="<?php echo $mx;  ?>" style="border: none; background:#ddd; "> <?php 
                                echo '<td>'; echo $producto = $fila['articulo'];echo '</td>'; ?>
                                <td><input type="text" name="cantidad" value="1" style="width: 30px;"></td>
                                <?php
                                echo '<td>';
                                echo number_format($fila['precio_venta'], 2);
                                echo '</td>';
                                echo '<td>';
                                echo "<button id='KK' style='padding: 8px 15px; background: orange; color:black; border-radius:10px; borber:none; cursor:pointer; '>Facturar</button> ";
                                echo '</td>';
                                ?>
                            </form> <?php
                                    echo '</tr>';
                                }
                            } else {


                                echo '<div class="cliente" style="margin-left: 30px;">articulo no encotrado</div>';
                            }
                        }
                    }

                                    ?>

        </tbody>
    </table>
    </div>
    
    <div class="fac2">
        <table class="um">
            <thead>
                <tr>
                    <td colspan="" style="font-size: 24px;">TOTAL</td>
                    <td style="">RD</td>
                    <td style="">
                        <?php $suma = mysqli_query($conexion, "SELECT SUM(sub_total) FROM pedidos WHERE vendedor ='$nombre'");
                        $row = mysqli_fetch_row($suma);
                        $total = $row[0];

                        echo  number_format($total, 2); ?></td>
    
                    <td style="background: green;"><button><?php
                    $consulta = mysqli_query($conexion, "SELECT * FROM pedidos WHERE vendedor ='$nombre'");
                        if (mysqli_fetch_assoc($consulta) >= 1) {
                            echo ' <a class="gt" style="text-decoration: none;background:green;color:white;" href="confirmar.php?nun=' . $numero_aleatorio . '" >PROCESAR</a> ';
                        }
                    ?></button></td>

                </tr>
                <tr>
                
                    <th>Producto</th>
                    <th>cantidad</th>
                    <th>Precio</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include './../conexion_DB/Conexion.php';


                $mostrar_q = "SELECT * FROM pedidos WHERE vendedor = '$nombre'";
                $total_q = mysqli_query($conexion, $mostrar_q);
                ?>
                <?php while ($fila_q = mysqli_fetch_assoc($total_q)) { ?>

                    <tr class="no1">

                        <td><?php echo $fila_q['articulos'] ?> </td>
                        <td><?php echo $fila_q['cantidad']   ?></td>
                        <td><?php echo number_format($fila_q['precio_venta'], 2); ?></td>
                        <!-- <td><?php echo number_format($fila_q['sub_total'], 2); ?></td> -->
                        <td><button id="ex"><?php echo "<a href='./../vendedor_Screen/eliminar/eliminat_articlo.php?id=" . $fila_q['id_pedidos'] . "'>-</a>"; ?>

                            </button></td>
                    <?php } ?>
                    </tr>
            </tbody><a href="" target="_blank"></a>
        </table>
    </div>
    </div>
    </div>
</div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
        </div>
    </div>
    <!-- 
                             <button id="myBtn">Facturar</button> -->

    <script>
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>