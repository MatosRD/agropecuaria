<?php  

include 'conexion_2.php';
header("Content-Type: application/xls");    
	
header("Content-Disposition: attachment; filename=documento_exportado_" .        date('d:m:y').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

?>
<style>

table thead tr th{
    height: 30px;
}



table tfoot tr td{
    height: 40px;
    font-size: 20px;
}


table tbody tr td{
    padding: 10px 20px;
    font-family: Arial, Helvetica, sans-serif;
    
    text-align: center;
    
}

    tr:nth-child(even){
    background-color:#ddd ;
}.cuentax{
    text-align: center;
    background: red;
    color: white;
    margin: 10px;
    border-radius: 10px;
}.focu{
    display: flex;
    justify-content: center;
    padding: 10px 15px;
    background: green;
    color: white;
    border-radius: 10px;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACTURA <?php echo $fe = date('d/m/y');  ?></title>
</head>
<body>


<h1 style="text-align:center;" >Factura Vendidas</h1>

<div class="focu">
<?php         include 'conexion_2.php';
            $total = 0 ; 
            $nart = mysqli_query($conexion,"SELECT * FROM facturacion_venta_1");
            while($fila = mysqli_fetch_assoc($nart)){
            $sun = $fila['sub'];
            $total += $sun;
        }   echo'<h1 style="text-align:center;" >RD ';  echo  number_format( $total, 2);  echo'</h1>' ; ?>  
</div>


<h1 style="text-align:center;" >FECHA <?php echo $fe = date('d/m/y');  ?></h1>

<div class="fac" style="display:flex; margin-top:50px; justify-content: center;">
                <table class="um" style=" border-collapse:collapse ;">
                    <thead >
                        <tr style="background: blue; color:white;" >
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

                    <tr style="text-align:center;">
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