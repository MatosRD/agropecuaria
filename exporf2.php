<?php  

include 'conexion_2.php';
header("Content-Type: application/xls");    
	
header("Content-Disposition: attachment; filename=documento_exportado_" .        date('d:m:y').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="fac" style="display:flex; margin-top:50px; justify-content: center;">
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
                    <tbody style="text-align: center;">
                    <?php
                include 'conexion_2.php';
                
                $mostrar_a = "SELECT * FROM facturacion_venta_1";
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

                                    
                    </tbody>
                </table>

</body>
</html>