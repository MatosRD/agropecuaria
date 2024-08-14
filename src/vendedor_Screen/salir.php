<?php
    session_start();
    include './../conexion_DB/Conexion.php';
    $id = $_SESSION["id_vendedor"];
    date_default_timezone_set('America/Santo_Domingo');
    $fecha = date('H:i');
    $registro = mysqli_query($conexion, "UPDATE vista SET cierre = '$fecha' WHERE id_vista = '$id'");
    session_destroy();
    header("location: ./../login/login.php");
    
?>