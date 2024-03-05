<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>DUADRE <?php echo $fe = date('d/m/y'); ?></title>
</head>
<body>
    


<?php  

include 'conexion_2.php';

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
    padding: 10px 30px;
    font-family: Arial, Helvetica, sans-serif;
    
    text-align: center;
    
}

    tr:nth-child(even){
    background-color:#ddd ;
}
</style>


<h1 style="text-align:center;" >CUADRE DE CAJA</h1>




<h1 style="text-align:center;" >Fecha inicial: <?php                        
                        echo $fecha_1 = $_GET['fechao']; ?>----
                       Fecha final:<?php echo $fecha_2 = $_GET['fechat']; ?></h1>



<div class="fac"   style=" display:flex; justify-content: center;" >
                <table class="um" style=" border-collapse:collapse ;" >
                    <thead>
                        <tr style="background: blue; color:white; " >
                            <th>Codigo</th>
                            <th>Descripcion</ht>
                            <th>Cantidad</ht>
                            <th>Fecha</th>
                            <th>precio</th>
                            <th>subtotal</th>                         
                        </tr>
                    </thead>
                    <tbody style="text-align:center; ">
                    <?php
                include 'conexion_2.php';
                
           
                        $fecha_1 = $_GET['fechao'];
                        $fecha_2 = $_GET['fechat'];
                        

                        $tre = mysqli_query($conexion, "SELECT * FROM facturacion_venta_1 WHERE fecha  BETWEEN '$fecha_1' AND '$fecha_2'    ");
                        $shi = 0;
                ?>
                <?php  while($fila = mysqli_fetch_assoc($tre)) { ?>

                    <tr class="no1"  >
                    <td><?php echo $fila['codigo'] ?> </td>
                    <td><?php echo $fila['descripcion_f'] ?> </td>
                    <td><?php echo $fila['cantidad_f'] ?> </td>
                    <td><?php echo $fila['fecha'] ?> </td>
                    <?php $pg = $fila['precio_f'] ?> 
                    <td > <?php echo number_format(  $pg, 2);?> </td>
                    <?php  $preci = $fila['sub'] ?> 
                    <td>  <?php echo number_format( $preci, 2);?>  </td>
                    <?php   $shi += $preci ;  } ?>

                    </tr>    

                  
                                    
                    </tbody>
                    <tfoot  >
                        <tr  >
                            <td  colspan="5" style="background: blue; color:white; text-align:center; ">TOTAL</td>
                            <td style="background: green; color:white; " > <?php  echo number_format( $shi, 2);  ?></td>
                        </tr>
                    </tfoot>
                    
                </table>
 </div>
 </div>
  
 </body>
</html>