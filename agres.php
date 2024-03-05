<?php

include 'conexion_2.php';

if(!empty(['agre'])){
    if(!empty($_POST['usuario']) and !empty($_POST['clave']) and!empty($_POST['cargo'])  ){
        $aa = $_POST['usuario'];
        $bb = $_POST['clave'];
        $cc = $_POST['cargo'];
        $un = 1;

        $ins = "INSERT INTO usuarios_1 (usuario, contrasena, rol, cargo) VALUES ('$aa','$bb','$un','$cc' )";

       mysqli_query($conexion, $ins);


        

    }
}



?>