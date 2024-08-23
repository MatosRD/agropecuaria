<?php

    include './../../conexion_DB/Conexion.php';
    header("Content-Type: application/xls");    
        
    header("Content-Disposition: attachment; filename=Salida_Productos" .        date('d:m:y').".xls");
    header("Pragma: no-cache"); 
    header("Expires: 0");

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>salida <?php echo $fe = date('d/m/y'); ?></title>
</head>
<body>
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>salida <?php echo $fe = date('d/m/y'); ?></title>

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
                    <th style="background:#6836ff;">Fecha</th>
                    <th style="background:#6836ff;">Cantidad</th>
                  
                                    
                </tr>
            </thead>
            <tbody>
            <?php 
                    $fecha_1 = $_GET['fechai'];
                    $fecha_2 = $_GET['fechat'];
                if(!empty(['BUBU'])) {
                    if(!empty($_POST['dad']) ) {
                        $fecha_1 = $_POST['dad'];
                        $fecha_2 = $_POST['mom'];
                        
                        $tre = mysqli_query($conexion, "
    SELECT 
        articulo, vendedor, fecha,
        SUM(cantidad) AS RecuentoFilas
    FROM 
        pedidos_c
    WHERE 
        fecha BETWEEN '$fecha_1' AND '$fecha_2'
    GROUP BY 
        articulo
    HAVING 
        COUNT(*) > 0");
                     
                        
                            // $tre = mysqli_query($conexion, "SELECT * FROM pedidos_c WHERE fecha BETWEEN  '$fecha_1' AND  '$fecha_2'");
                           
                           
            ?>
            <?php  while($fila = mysqli_fetch_assoc($tre)) { ?>
                <tr class="no1">
                    <td><?php echo $fila['articulo'] ?> </td>
                    <td><?php echo $fila['vendedor'] ?> </td> 
                    <td> <?php echo $fila['fecha'] ?> </td> 
                    <td><?php echo $fila['RecuentoFilas'] ?> </td>
                    
                  
                </tr>    
                <?php } ?>                         
                </tbody>
      
                </table>
 </div>

<?php }}  ?>

</body>
</html>