<?php  
include 'conexion_2.php';
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=documento_exportado_" .        date('d:m:y').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");
?>
<div class="cuentax" style="text-align:center;"  >
<div class="cuentax1" style="text-align:center; margin:10px; ">
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
    echo'<h1 style="text-align:center; color:red;">$ ';  echo  number_format( $rel, 2);  echo'</h1>' ;    
?>
</div>
<div class="cuentax1" style="text-align:center; margin: 10px; " >
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
    echo'<h1 style="text-align:center; color:green; " >$ '    .number_format( $tt, 2). '</h1>' ;    
?>
</div>
</div>


<h1 style="text-align:center;" >FECHA <?php echo $fe = date('d/m/y');  ?></h1>

<div class="tabl" style="display: flex; justify-content: center; ">
        <table  >
            <thead  >
                <tr style="background: blue; color:white; " >
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Fecha abonacion</th>
                    <th>Abonacion</th>
                    <th>Cueta a Pagar</th>
                    <th>Deuda</th>
                    <th>Estado</th>
                    

                </tr>
            </thead>
            <tbody style="text-align:center;">


            
                <?php
                include 'conexion_2.php';
                $mostrar_a = "SELECT  distinct nombre_d, cedula ,fecha_a ,abonacion ,deuda FROM deuda_1  ";
                $total = mysqli_query($conexion, $mostrar_a);
                
                while($fila = mysqli_fetch_assoc($total)) { $ff = 0 ; ?>
                <tr style="justify-content: center;"  >
                    
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
                    <td><?php echo number_format( $ff, 2); ?></td>
                    <?php  $one = number_format( $abon);  ?>
                    <?php $dos = number_format( $ff ); ?>
                    <td><?php echo $xx =  $fila['deuda']  ?></td>
                    <?php if($xx <= 0.99  and $one == $dos ){ 
                    echo '<td  style="background: green; color:white;" > Pagado</td> ';
                     }else{
                    echo '<td  style="background: red; color:white;" > Deuda</td> ';
                    }
                     }
                    ?>
                     