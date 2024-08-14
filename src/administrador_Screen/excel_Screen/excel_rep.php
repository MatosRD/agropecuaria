<?php

    include './../../conexion_DB/Conexion.php';
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
    <title>Cliente <?php echo $fe = date('d/m/y'); ?></title>
</head>
<body>

    <style>

    table thead tr th{
        height: 30px;
    }



    table tfoot tr td{
        height: 40px;
        font-size: 20px;
    }


    table tbody tr td{
        padding: 10px 30px;
        font-family: Arial, Helvetica, sans-serif;
        
        text-align: center;
        
    }

        tr:nth-child(even){
        background-color:#ddd ;
    }
    </style>



<div class="fac_2" style="margin-bottom: 0px;" >
        <table class="um" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th style="background:#6836ff;">Producto</th>
                    <th style="background:#6836ff;">vendedor</th>
                    <th style="background:#6836ff;">Cantidad</th>
                    <th style="background:#6836ff;">Fecha</th>
                    <th style="background:#6836ff;">Precio</th>
                    <th style="background:#6836ff;">Subtotal</th>                       
                </tr>
            </thead>
            <tbody>
            <?php 
                
                $fecha_1 = $_GET['fechai'];
                $fecha_2 = $_GET['fechat'];
                $vendedor = $_GET['vend'];
                      
                        if($vendedor == ""){
                            $tre = mysqli_query($conexion, "SELECT * FROM pedidos_c WHERE fecha BETWEEN  '$fecha_1' AND  '$fecha_2'");
                            $shi = 0;
                            $ga = 0;
                            
                        }else{
                            $tre = mysqli_query($conexion, "SELECT * FROM pedidos_c WHERE fecha BETWEEN  '$fecha_1' AND  '$fecha_2' AND vendedor = '$vendedor'");
                            $shi = 0;
                            $ga = 0;
                        }            
            ?>
            <?php  while($fila = mysqli_fetch_assoc($tre)) { ?>
                <tr class="no1">
                    <td><?php echo $fila['articulo'] ?> </td>
                    <td><?php echo $fila['vendedor'] ?> </td>
                    <td><?php echo $fila['cantidad'] ?> </td>
                    <td><?php echo $fila['fecha'] ?> </td>
                    <td><?php echo $fila['precio_venta'] ?> </td>
                    <td><?php echo $preci = $fila['sub_total'] ?> </td>
                    <?php  $ganancia = $fila['ganancia'] ?> 

                    <?php   $shi += $preci ;    
                            $ga += $ganancia;
                    
                    ?>
                </tr>    
                <?php } ?>  
                <tr>
                    <td colspan="5">TOTAL</td> 
                    <td style="background: green; color:white;"> <?php echo 'RD' .$shi  ?></td>                      
                </tr>
                <tr>
                    <td colspan="5">GANANCIA</td> 
                    <td style="background: green; color:white;"> <?php echo 'RD' .$ga  ?></td>                      
                </tr>
                </tbody>
                </table>
            </div>
          
</body>
</html>