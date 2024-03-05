<?php

include 'conexion_2.php';


if(!empty(['PP'])){
    if(!empty($_POST['nom_cliente']) and !empty($_POST['cedula_cliente'])  ){
        $nombre = $_POST['nom_cliente'];
        $cedula = $_POST['cedula_cliente'];

        $buscar_clave = mysqli_query($conexion,"SELECT * FROM deuda_1 WHERE nombre_d = '$nombre'");
        if(mysqli_num_rows($buscar_clave) == 0){
            $insert = mysqli_query($conexion, "INSERT INTO deuda_1 (nombre_d, cedula) VALUES ('$nombre','$cedula')   ");
            echo'<div id="green"> Cliente Agregado</div>';
            echo '<a href="deuda1.php" style="display: flex; justify-content: center; color:blue; " >Volver </a>';
            exit;
        }else{
            echo '<div id="green" style="background:red;" > Cliente Existente</div>';
        }
 
}
}



?>