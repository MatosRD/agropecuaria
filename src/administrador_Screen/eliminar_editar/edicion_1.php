<?php
include './../../conexion_DB/Conexion.php';

if(isset($_POST["edid"])){
    if(!empty($_POST["cliente"]) and !empty($_POST["direccion"]) and !empty($_POST["logintud"]) and !empty($_POST["latitud"])){
        $nombrenew = $_POST['cliente'];
        $direccionnew = $_POST['direccion'];
        $longitudnew = $_POST['logintud'];
        $latitudnew = $_POST['latitud'];
    
    
        $SQL = "UPDATE cliente SET nombre = '$nombrenew', direccion = '$direccionnew', longitud = '$longitudnew', latitud = '$latitudnew'
        WHERE id_cliente = '$id'";
        $tll = mysqli_query($conexion, $SQL);
        $cliente = $nombrenew; 
        $direccion = $direccionnew;
        $latitud = $longitudnew; 
        $logintud = $latitudnew;
    

        echo' <div class="EDID" >Editado Exitosamente </div>';
    }else{
        echo' <div class="EDID" > Campos Vacios Intente Nuevamente</div>  ';
    }

    }
      



?>