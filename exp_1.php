
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CxC <?php echo $fe = date('d/m/y');  ?></title>
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
    padding: 10px 20px;
    font-family: Arial, Helvetica, sans-serif;
    
    text-align: center;
    
}

    tr:nth-child(even){
    background-color:#ddd ;
}.cuentax .cuentax1{
    text-align: center;
    background: red;
    color: white;
    margin: 10px;
    border-radius: 10px;
}
</style>


<div class="cuentax"  >


    <div class="cuentax1" style="margin: 10px;" >
    <h1>Cuenta X Cobrar</h1>
    <?php  

include 'conexion_2.php';

$todo = mysqli_query($conexion,"SELECT * FROM deuda_1");
$sun = 0 ;
while($fila = mysqli_fetch_assoc($todo)){
   
    
        $a = $fila['abonacion'];
        $ds = $fila['sub_d'];
        $sun += $ds;
    }

    $mostrar_a = "SELECT  distinct abonacion FROM deuda_1  ";    
    $total = mysqli_query($conexion, $mostrar_a);

    $tt = 0;
    while($filas = mysqli_fetch_assoc($total)) {  

        
         $nb = $filas['abonacion']; 
        $tt += $nb;
    } 
    $rel = $sun - $tt;

  
        echo'<h1 style="text-align:center;" >$ '    .number_format( $rel, 2). '</h1>' ;    
     
 
?>
</div>
<div class="cuentax1" style="background:green; margin: 10px; " >
    <h1>Cuenta Pagada</h1>
    <?php  

include 'conexion_2.php';

$todo = mysqli_query($conexion,"SELECT * FROM deuda_1");


    $mostrar_a = "SELECT  distinct abonacion FROM deuda_1  ";    
    $total = mysqli_query($conexion, $mostrar_a);

    $tt = 0;
    while($filas = mysqli_fetch_assoc($total)) {  

        
         $nb = $filas['abonacion']; 
        $tt += $nb;
    } 


  
        echo'<h1 style="text-align:center;" >$ '    .number_format( $tt, 2). '</h1>' ;    
     
 
?>
</div>
</div>



<h1 style="text-align:center;" >FECHA <?php echo $fe = date('d/m/y');  ?></h1>



<table style=" border-collapse:collapse ;" >
            <thead style="background: blue; color:white;" >
                <tr>
                <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Fecha abonacion</th>
                    <th>Abonacion</th>
                    <th>Cueta a Pagar</th>
                    <th>Deuda</th>
                    <th>Estado</th>
                    
                    

                </tr>
            </thead>
            <tbody style="text-align:center;" >


            
                <?php
                include 'conexion_2.php';
                $mostrar_a = "SELECT  distinct nombre_d, cedula ,fecha_a ,abonacion ,deuda FROM deuda_1  ";
                $total = mysqli_query($conexion, $mostrar_a);
                
                while($fila = mysqli_fetch_assoc($total)) { $ff = 0; ?>
                <tr>
                    
                    
                <td><?php echo $nb = $fila['nombre_d']  ?> </td>
                    <td><?php echo $fila['cedula']  ?></td>
                    <td><?php echo $fila['fecha_a']  ?></td>
                    <td><?php echo $abon = $fila['abonacion']  ?></td>

                    <?php  
                    $most = mysqli_query($conexion, "SELECT * FROM deuda_1 WHERE nombre_d = '$nb' ");
                    while($filas = mysqli_fetch_assoc($most)){
                        
                        $ds = $filas['sub_d'];
                        $ff += $ds;
                    }
                    ?>
                     <td><?php echo number_format( $ff, 2); ?></td>
                    <?php  $one = number_format( $abon);  ?>
                    <?php $dos = number_format( $ff ); ?>
                    <td><?php echo $xx =  $fila['deuda']  ?></td>
                    <?php if($xx <= 0.99  and $one == $dos ){ 
                    echo '<td  style="background: green; color:white;" > Pagado</td> ';
                     }else{
                    echo '<td  style="background: red; color:white;" > Deuda</td> ';
                    }?>

                    
                    
                    
                    
                    <?php } ?>
                </tr>   
                 
             
            </tbody>
        </table>
        

</body>
</html>