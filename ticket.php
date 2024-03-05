<?php

include_once "vendor/autoload.php";

$medidaTicket = 180;

?>
<!DOCTYPE html>
<html>

<head>

    <style>
        * {
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
        }

        h1 {
            font-size: 18px;
        }

        .ticket {
            margin: 2px;
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
            margin: 0 auto;
        }

        td.precio {
            text-align: center;
            font-size: 11px;
        }

        td.cantidad {
            font-size: 11px;
        }

        td.producto {
            text-align: center;
        }
        td.sub {
            text-align: center;
        }

        th {
            text-align: center;
        }


        .centrado {
            text-align: center;
            align-content: center; 
        }

        .ticket {
            width: <?php echo $medidaTicket ?>px;
            max-width: <?php echo $medidaTicket ?>px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        * {
            margin: 0;
            padding: 0;
        }

        .ticket {
            margin: 0;
            padding: 0;
        }

        body {
            text-align: center;
        }.descrip  {
            text-align: justify; 
        }
    </style>

<?php 
include 'conexion_2.php';



$aleatorio = $_GET['nun'];
$buscar1 = mysqli_query($conexion,"SELECT * FROM facturacion_venta_1 WHERE nofactura = '$aleatorio' ");
?>

</head>

<body>
    <div class="ticket centrado">
        
        <h1>Agro-Veterinaria Manuela</h1>
        <h2 >Tel: 809-705-7533</h2>
        <h2>RNC 0000000</h2>
        <div class="descrip">
        <h2>Fecha: <?php echo $fecha =  date("d-m-Y");   ?></h2>
        <h2>Hora: <?php echo $hora =  date("h-i-s");?></h2>
        <h2>Caja: 01</h2>
        <h2>NDF: <?php  echo $aleatorio ?></h2>
        </div>
        <br>
        <h2>venta</h2>
        <br>
        <?php
        # Recuerda que este arreglo puede venir de cualquier lugar; aquí lo defino manualmente para simplificar
        # Puedes obtenerlo de una base de datos, por ejemplo: https://parzibyte.me/blog/2019/07/17/php-bases-de-datos-ejemplos-tutoriales-conexion/

        ?>

        <table>
            <thead>

                <tr class="centrado">
                    <th class="producto">Descripcion-</th>
                    <th class="cantidad">Itbis-</th>
                    <th class="precio">Valor</th>
                </tr>
            </thead>
            <tbody>
            
            <?php
                
                
                $buscar = mysqli_query($conexion,"SELECT * FROM facturacion_venta_1 WHERE nofactura = '$aleatorio'");    
                $total = 0;
                while($filas = mysqli_fetch_assoc($buscar)){
                    $descrip = $filas['descripcion_f'];
                    $canti = $filas['cantidad_f'];  
                    $pre = $filas['precio_f'];
                    $sub = $filas['sub'];   
                    $total += $sub;
                
                ?>
                    <tr>
                        <td class="cantidad"><?php echo $descrip. '<br>' .$canti . ' x '. $pre ?></td>
                        <td class="producto"><?php echo $filas['itbis']; ?></td>
                        <td class="precio"><?php  echo $sub  ?></td>
                    </tr>
                    <?php  }  ?>
            </tbody>
            <tr>
                
                <td class="producto">
                    <strong>TOTAL </strong>
                </td>
                <td>

                </td>
                <td class="precio" >
                <b><?php  echo  number_format( $total, 2); ?></b>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <p class="centrado">  <?php   echo '<a href="as.php?nun='.$aleatorio.'" style="font-size:10px ;"; >¡GRACIAS POR SU COMPRA!</a>'; ?> </p>
        <p>----------------------------------------</p>
        <p style="text-align: justify; font-size: 12px;"> <b>NOTA: no somos reponsables de mercancias no retirada despues de 10 dias; No se acepta devolucion de articulos cortados o pesados </b></p>         
    </div>
</body>



