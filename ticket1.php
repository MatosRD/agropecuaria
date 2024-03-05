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

$buscar1 = mysqli_query($conexion,"SELECT * FROM cotizacion_1");
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
        <h2>NDF:</h2>
        </div>
        <br>
        <h2>Cotización</h2>
        <br>
        <?php
        # Recuerda que este arreglo puede venir de cualquier lugar; aquí lo defino manualmente para simplificar
        # Puedes obtenerlo de una base de datos, por ejemplo: https://parzibyte.me/blog/2019/07/17/php-bases-de-datos-ejemplos-tutoriales-conexion/

        ?>

        <table>
            <thead>

                <tr class="centrado">
                    <th class="producto">producto-</th>
                    <th class="cantidad">itbis-</th>
                    <th class="precio">sub</th>
                </tr>
            </thead>
            <tbody>
            
            <?php
                
                
                $buscar = mysqli_query($conexion,"SELECT * FROM cotizacion_1");    
                $total = 0;
                while($filas = mysqli_fetch_assoc($buscar)){
                    $descrip = $filas['descripcion_c'];
                    $canti = $filas['cantidad_c'];  
                    $pre = $filas['precio_c'];
                    $sub = $filas['sub_c'];  
                    $it = $filas['itbis_c']; 
                    $total += $sub;
                
                ?>
                    <tr>
                        <td class="cantidad"><?php echo $descrip. '<br>' .$canti . ' x '. $pre ?></td>
                        <td class="producto"><?php echo $it   ?></td>
                        <td class="precio"><?php  echo number_format($sub, 2);  ?></td>
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
                <?php  echo  number_format( $total, 2);  ?>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <p>Esta cotizacion esta sujeta a cambios de precio tras un periodo de 3 dias</p> 
        <p>----------------------------------------</p>
        <p style="text-align: justify; font-size: 12px;"> <b>NOTA: no somos reponsables de mercancias no retirada despues de 10 dias; No se acepta devolucion de articulos cortados o pesados </b></p>                     
    </div>
</body>



</html>

<?php





?>