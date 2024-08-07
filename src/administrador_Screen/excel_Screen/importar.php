<?php

if(!empty(['subir'])){
    if(!empty($_FILES['dataCliente']['tmp_name'])){
        require('./../../conexion_DB/Conexion.php');


$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;
foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {
        $datos = explode(",", $linea);
       
        $codigo = !empty($datos[0]) ? $datos[0] : '';
        $articulo = !empty($datos[1]) ? $datos[1] : '';
        $precio_costo = !empty($datos[2]) ? $datos[2] : '';
        $precio_venta = !empty($datos[3]) ? $datos[3] : '';
        $cantidad = !empty($datos[4]) ? $datos[4] : '';
        $ganancia = !empty($datos[5]) ? $datos[5] : '';
        $cantidad_vendida = !empty($datos[6]) ? $datos[6] : '';

        // Verificar si el código no está vacío
        if (!empty($codigo)) {
            $checkemail_duplicidad = "SELECT * FROM inventario WHERE codigo ='$codigo'";
            $ca_dupli = mysqli_query($conexion, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);

            // No existe Registros Duplicados
            if ($cant_duplicidad == 0) {
                $insertar = "INSERT INTO inventario(codigo, articulo, precio_costo, precio_venta, cantidad, ganancia, cantidad_vendida) 
                             VALUES('$codigo', '$articulo', '$precio_costo', '$precio_venta', '$cantidad', '$ganancia', '$cantidad_vendida')";
                mysqli_query($conexion, $insertar);
            } else {
                // Caso Contrario actualizo el o los Registros ya existentes
                $updateData = "UPDATE inventario SET 
                               articulo = '$articulo',           
                               precio_costo = '$precio_costo',              
                               precio_venta = '$precio_venta',                
                               cantidad = '$cantidad',            
                               ganancia = '$ganancia',              
                               cantidad_vendida = '$cantidad_vendida'             
                               WHERE codigo = '$codigo'";
                mysqli_query($conexion, $updateData);
            }
        }
    }

    echo '<div>'.$i."). ".$linea.'</div>';
    $i++;
}

?>
<div style="display: flex; justify-content: center; height: 100vh; align-items: center;">
    <div style="padding:15px 15px; border-radius: 10px; margin: 10px; background:rgb(233, 233, 105); box-shadow: -16px 27px 56px -18px rgba(0,0,0,0.44); text-align:center;">
        <?php echo 'Importado Exitosamente'; ?><br><br>
        <a href="./../../administrador_Screen/inicio_administrador.php">Volver</a>
    </div>
</div>
<?php



    }else{
        echo'cargar ';
    }
}
?>

