<?php  

include 'conexion_2.php';
header("Content-Type: application/xls");    
	
header("Content-Disposition: attachment; filename=documento_exportado_" .        date('d:m:y').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

?>
<div class="fac">
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
                    <tbody>
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
  