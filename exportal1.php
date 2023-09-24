<?php  

include 'conexion_2.php';
header("Content-Type: application/xls");    
	
header("Content-Disposition: attachment; filename=documento_exportado_" .        date('d:m:y').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

?>

<div class="tabl" style="display: flex; justify-content: center; ">
        <table  >
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
            <tbody>


            
                <?php
                include 'conexion_2.php';
                $mostrar_a = "SELECT  distinct nombre_d, cedula ,fecha_a ,abonacion ,deuda FROM deuda_1  ";
                $total = mysqli_query($conexion, $mostrar_a);
                
                while($fila = mysqli_fetch_assoc($total)) { $ff = 0 ; ?>
                <tr>
                    
                    <form action="" method="post">
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
                    }
                     }
                    ?>
                     