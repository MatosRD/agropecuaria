<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <div class="fechi">
        <div class="fechi_1">
            <form action="" method="post" >
                <div class="fechi2">
                    <h4>Fecha inicial</h4>
                        <input type="text" name="dad" placeholder="dd/mm/yyyy" ></input>
                </div>

                <div class="fechi2">
                    <h4>Fecha final</h4>
                        <input type="text" name="mom" placeholder="dd/mm/yyyy" ></input>
       
                </div>

                <button id="BUBU" >Buscar</button>
            </form>   
        </div>
    </div>

    <div class="fac_2" style="margin-bottom: 20px;" >
        <table class="um">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Precio</th>
                    <th>Subtotal</th>                       
                </tr>
            </thead>
            <tbody>
            <?php include './../conexion_DB/Conexion.php';
                
                if(!empty(['BUBU'])){
                    if(!empty($_POST['dad'])  ){ 
                        $fecha_1 = $_POST['dad'];
                        $fecha_2 = $_POST['mom'];
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
                    <?php   $shi += $preci ; ?>
                </tr>    
                <?php } ?>                         
                </tbody>
                <tfoot style="height:60px;text-align: center;font-size: 24px;">
                <tr>
                    <td colspan="4" style="background: blue; color:white;">TOTAL</td>
                    <td  style="background: blue; color:white;">RD</td>
                    <td style="background: green; color:white; " > <?php echo  number_format( $shi, 2);   ?></td>
                </tr>
                </tfoot>
                </table>
 </div>
            <?php }} ?>



</body>
</html>