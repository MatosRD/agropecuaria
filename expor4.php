<?php  

include 'conexion_2.php';
header("Content-Type: application/xls");    
	
header("Content-Disposition: attachment; filename=documento_exportado_" .        date('d:m:y').".xls");
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
    height: 30px;
}



table tfoot tr td{
    height: 40px;
    font-size: 20px;
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


<h1 style="text-align:center;" >Articulos</h1>
  

<div style="margin-left: -30px;" >
        <table style=" border-collapse:collapse ;">
            <thead>
                <tr style="background: blue; color:white; ">
                    <th>Codigo</th>
                    <th  >Descripcion</ht>
                    <th>Cantidad</ht>
                    <th>Unidad</th>
                    <th>Precio de compra</th>
                    <th>Porcentage</ht>
                    <th>Precio de venta</ht>
                    <th>Margen Ganancia</ht>
                    <th>compra prod, suplid...</ht>
                    <th>Venta prod, negocio</ht>
                    
                </tr>
            </thead>
            <tbody style="text-align:center;">
                <?php
                include 'conexion_2.php';
                
                $mostrar_a = "SELECT * FROM articulos_v1 ORDER BY cantidad ASC ";
                $total = mysqli_query($conexion, $mostrar_a)
                ?>
                <?php  while($fila = mysqli_fetch_assoc($total)) { ?>

                    <tr class="no1">
                    <td><?php echo $fila['codigo'] ?> </td>
                    <td><?php echo $fila['descripcion'] ?> </td>
                    <td><?php echo $fila['cantidad'] ?> </td>
                    <td><?php echo $fila['unidad'] ?> </td>
                    <td><?php echo $fila['cantidad_v'] ?> </td>
                    <td><?php echo $fila['precio_c'] ?> </td>
                    <td><?php echo $fila['precio_v'] ?> </td>
                    <td><?php echo $fila['margen_g'] ?> </td>
                    <td><?php echo $fila['compra_p_s'] ?> </td>
                    <td><?php echo $fila['venta_p_n'] ?> </td>

                    </tr>    
                <?php } ?>

                <?php 
    if(!empty("buscar_c")){ 
    if(!empty($_POST['busc'])){ 
        $bus = $_POST['busc'];
        $sentencia = "SELECT * FROM articulos_v1 WHERE descripcion like '%$bus%' or codigo = '$bus' ";
            $total = mysqli_query($conexion, $sentencia);
            if(mysqli_num_rows($total) > 0) {
                echo '<style>.tabl table .no1{
                    display: none;
                    }
                    </style>';
                   
                echo '<a href="administracion.php"><button  style="display:flex; color: white; background: blue;
                padding: 8px 15px; border:none; border-radius:10px;text-decoration: none;  margin-left: 30px; cursor: pointer; "> Limpiar pantalla</button></a>';
                while($fila = mysqli_fetch_assoc($total)){
                    echo '<tr class="no2">';   
                        
                        echo '<td>'; echo $fila['codigo']; echo '</td>';
                        echo '<td>'; echo $fila['descripcion']; echo '</td>';
                        echo '<td>'; echo $fila['cantidad']; echo '</td>';
                        echo '<td>'; echo $fila['unidad']; echo '</td>';
                        echo '<td>'; echo $fila['precio_c']; echo '</td>';
                        echo '<td>'; echo $fila['porcentage']; echo '</td>';
                        echo '<td>'; echo $fila['precio_v']; echo '</td>';
                        echo '<td>'; echo $fila['margen_g']; echo '</td>';
                        echo '<td>'; echo $fila['compra_p_s']; echo '</td>';
                        echo '<td>'; echo $fila['venta_p_n']; echo '</td>';
                        echo '<td>'; echo" <a href='eliminar.php?id=".$fila['id_articulo']." ' 
                        onclick='return confirmar()' class='aa' >Eliminar</a>
                        
                        <a href='editar.php?id=".$fila['id_articulo'].  "' 
                        ' class='ab' >Editar</a>"
                        ; echo '</td>';

                       


                echo '</tr>';
                
                 }    
                 
            }else{
        

                echo '<div class="cliente" style="margin-left: 30px;">articulo no encotrado</div>';
            }
        }
    }
    ?>       

                            
            </tbody>
        </table>


</body>
</html>