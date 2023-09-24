
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

<table >
            <thead>
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
                    <td><?php echo $ff ?></td>
                    
                    <td><?php echo $xx =  $fila['deuda']  ?></td>
                    <?php if($xx == 0  and $ff == $abon ){ 
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