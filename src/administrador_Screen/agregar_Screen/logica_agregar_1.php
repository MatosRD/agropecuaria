<?php
include './../../conexion_DB/Conexion.php';

if(!empty(['pp'])){
    if(!empty($_POST['cliente']) and !empty($_POST['direccion']) and !empty($_POST['longitud']) and !empty($_POST['latitud'])){
        $cliente = $_POST['cliente'];
        $direccion = $_POST['direccion'];
        $longitud = $_POST['longitud'];
        $latitus = $_POST['latitud'];
    

        $varidar = mysqli_query($conexion, "SELECT * FROM cliente WHERE nombre = '$cliente'");    
        $cant_duplicidad = mysqli_num_rows($varidar);

            if($cant_duplicidad == 0){

            $insertar = "INSERT INTO cliente (nombre, direccion, longitud, latitud) 
            VALUES ('$cliente','$direccion','$longitud','$latitus')";

            $sql = mysqli_query($conexion, $insertar);
           echo'<div style=" displey:flex;margin:10px; text-align: center; padding: 10px 10px;
            background: green;
            color: white;" >Agregado</div>';
            }else{
                echo'<div style=" displey:flex;margin:10px; text-align: center; padding: 10px 10px;
            background: red;
            color: white;" >Duplicado</div>';
            }
    }
 }

?>