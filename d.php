<?php
include 'conexion_2.php';

if(isset($_POST["edid"])){
    if(!empty($_POST["usuario"]) and !empty($_POST["clave"]) and !empty($_POST["cargo"]) ){
        $cdnew = $_POST['usuario'];
        $danew = $_POST['clave'];
        $canew = $_POST['cargo'];

    
        $SQLL = "UPDATE usuarios_1 SET usuario = '$cdnew', contrasena = '$danew', cargo = '$canew' WHERE id_usuarios = '$id'";
        $tll = mysqli_query($conexion, $SQLL);
        $cc = $cdnew; 
        $dd = $danew;
        $cct = $canew;
     
        echo' <div class="EDID" >Editado Exitosamente </div>  ';
    }

    }
      



?>