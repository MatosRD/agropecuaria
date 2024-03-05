
<?php

include 'conexion_2.php';



    $delete = "DELETE FROM facturacion_venta_1 ";
    $resul = mysqli_query($conexion, $delete);
    header("Location:todo.php");
    
    
 
    

?>