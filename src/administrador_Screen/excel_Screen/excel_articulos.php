<?php  

include './../../conexion_DB/Conexion.php';
header("Content-Type: application/xls");    
	
header("Content-Disposition: attachment; filename=Inventario" .        date('d:m:y').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTICULOS <?php echo $fe = date('d/m/y'); ?></title>
</head>
<body>


<style>

table thead tr th{
    height: 10px;
    font-size: 10px;
}



table tfoot tr td{
    height: 10px;
    font-size: 10px;
}


table tbody tr td{
    padding: 10px 5px;
    font-family: Arial, Helvetica, sans-serif;
    
    text-align: center;
    
}

    tr:nth-child(even){
    background-color:#ddd ;
}
</style>
  

<div style="margin-left: -30px;" >
        <table style=" border-collapse:collapse ;">
            <thead>
                <tr >
                    <th>Codigo</th>
                    <th>Articulo</ht>
                    <th>Cantidad</ht>
                    <th>Cantidad Vendida</th>
                    <th>Precio Costo</th>
                    <th>Precio venta</ht>
                    <th>Ganancia</ht>
                </tr>
            </thead>
            <tbody style="text-align:center;">
                <?php
                include './../../conexion_DB/Conexion.php';
                
                $mostrar_a = "SELECT * FROM inventario ORDER BY cantidad ASC ";
                $total = mysqli_query($conexion, $mostrar_a)
                ?>
                <?php  while($fila = mysqli_fetch_assoc($total)) { ?>

                    <tr class="no1">
                    <td><?php echo $fila['codigo'] ?> </td>
                    <td><?php echo $fila['articulo'] ?> </td>
                    <td><?php echo $fila['cantidad'] ?> </td>
                    <td><?php echo $fila['cantidad_vendida'] ?> </td>
                    <td><?php echo $fila['precio_costo'] ?> </td>
                    <td><?php echo $fila['precio_venta'] ?> </td>
                    <td><?php echo $fila['ganancia'] ?> </td>
               </tr>    
                <?php } ?>

    

                            
            </tbody>
        </table>


</body>
</html>