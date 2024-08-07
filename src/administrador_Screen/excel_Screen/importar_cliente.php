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
       
        $nombre = !empty($datos[0]) ? $datos[0] : '';
        $direccion = !empty($datos[1]) ? $datos[1] : '';
        $longitud = !empty($datos[2]) ? $datos[2] : '';
        $latitud = !empty($datos[3]) ? $datos[3] : '';
   
        // Verificar si el código no está vacío
        if (!empty($codigo)) {
            $checkemail_duplicidad = "SELECT * FROM cliente WHERE nombre ='$nombre'";
            $ca_dupli = mysqli_query($conexion, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);

            // No existe Registros Duplicados
            if ($cant_duplicidad == 0) {
                $insertar = "INSERT INTO cliente(nombre, direccion, longitud, latitud) 
                             VALUES('$nombre', '$direccion', '$longitud', '$latitud')";
                mysqli_query($conexion, $insertar);
            } else {
                // Caso Contrario actualizo el o los Registros ya existentes
                $updateData = "UPDATE cliente SET 
                               nombre = '$nombre',           
                               direccion = '$direccion',              
                               longitud = '$longitud',                
                               latitud = '$latitud'             
                               WHERE nombre = '$nombre'";
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

