<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    


<?php  

include 'conexion_2.php';

	

?>
<div class="fac"   style=" display:flex; justify-content: center;" >
                <table class="um" >
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Descripcion</ht>
                            <th>Cantidad</ht>
                            <th>Fecha</th>
                            <th>precio</th>
                            <th>subtotal</th>                         
                        </tr>
                    </thead>
                    <tbody style="text-align:center;">
                    <?php
                include 'conexion_2.php';
                
           
                        $fecha_1 = $_GET['fechao'];
                        $fecha_2 = $_GET['fechat'];
                        

                        $tre = mysqli_query($conexion, "SELECT * FROM facturacion_venta_1 WHERE fecha  BETWEEN '$fecha_1' AND '$fecha_2'    ");
                        $shi = 0;
                ?>
                <?php  while($fila = mysqli_fetch_assoc($tre)) { ?>

                    <tr class="no1">
                    <td><?php echo $fila['codigo'] ?> </td>
                    <td><?php echo $fila['descripcion_f'] ?> </td>
                    <td><?php echo $fila['cantidad_f'] ?> </td>
                    <td><?php echo $fila['fecha'] ?> </td>
                    <td><?php echo $fila['precio_f'] ?> </td>
                    <td><?php echo $preci = $fila['sub'] ?> </td>

                    <?php   $shi += $preci ;  } ?>

                    </tr>    


                                    
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" style="background: white; color:black;">TOTAL</td>
                            <td style="background: green;" >RD <?php  echo $shi ?>.00</td>
                        </tr>
                    </tfoot>
                    
                </table>
 </div>
 </div>
  
 </body>
</html>