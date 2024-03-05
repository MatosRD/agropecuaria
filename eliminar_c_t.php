<?php

include 'conexion_2.php';


$delete = "DELETE  FROM cotizacion_1 ";
$resul = mysqli_query($conexion, $delete);
header("Location: cotizacion.php");

?>