<?php
if (!empty($_FILES['dataCliente']['tmp_name'])) {
    require('./../../conexion_DB/Conexion.php');

    $tipo       = $_FILES['dataCliente']['type'];
    $tamanio    = $_FILES['dataCliente']['size'];
    $archivotmp = $_FILES['dataCliente']['tmp_name'];
    $lineas     = file($archivotmp);

    $i = 0;
    foreach ($lineas as $linea) {
        if ($i != 0) {
            $datos = explode(",", $linea);
           
            $nombre = trim($datos[0] ?? '');
            $direccion = trim($datos[1] ?? '');
            $longitud = trim($datos[2] ?? '');
            $latitud = trim($datos[3] ?? '');
       
            // Ensure the name is not empty
            if (!empty($nombre)) {
                // Check for duplicates
                $checkemail_duplicidad = "SELECT * FROM cliente WHERE nombre = ?";
                $stmt = mysqli_prepare($conexion, $checkemail_duplicidad);
                mysqli_stmt_bind_param($stmt, 's', $nombre);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $cant_duplicidad = mysqli_num_rows($result);
                
                if ($cant_duplicidad == 0) {
                    // Insert new record
                    $insertar = "INSERT INTO cliente(nombre, direccion, longitud, latitud) 
                                 VALUES(?, ?, ?, ?)";
                    $stmt = mysqli_prepare($conexion, $insertar);
                    mysqli_stmt_bind_param($stmt, 'ssss', $nombre, $direccion, $longitud, $latitud);
                    mysqli_stmt_execute($stmt);
                    
                } else {
                    // Update existing record
                    $updateData = "UPDATE cliente SET 
                                   direccion = ?, 
                                   longitud = ?, 
                                   latitud = ? 
                                   WHERE nombre = ?";
                    $stmt = mysqli_prepare($conexion, $updateData);
                    mysqli_stmt_bind_param($stmt, 'ssss', $direccion, $longitud, $latitud, $nombre);
                    mysqli_stmt_execute($stmt);
                }
            }
        }

        echo '<div>' . ($i + 1) . "). " . htmlspecialchars($linea) . '</div>';
        $i++;
    }
?>
<div style="display: flex; justify-content: center; height: 100vh; align-items: center;">
    <div style="padding:15px 15px; border-radius: 10px; margin: 10px; background:rgb(233, 233, 105); box-shadow: -16px 27px 56px -18px rgba(0,0,0,0.44); text-align:center;">
        <?php echo 'Importado Exitosamente'; ?><br><br>
        <a href="./../../administrador_Screen/cliente.php">Volver</a>
    </div>
</div>
<?php
} else {
    echo 'cargar ';
}
?>