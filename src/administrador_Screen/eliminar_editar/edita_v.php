<?php
include './../../conexion_DB/Conexion.php';

if(isset($_POST["edid"])){
    if(!empty($_POST["vendedor"]) and !empty($_POST["clave"])){
        $vendedornew = $_POST['vendedor'];
        $clavenew = $_POST['clave'];
    
    
        $SQL = "UPDATE login_v1 SET usuario = '$vendedornew', clave = '$clavenew'
        WHERE id_login = '$id'";
        $tll = mysqli_query($conexion, $SQL);
        $vendedor = $vendedornew; 
        $clave = $clavenew;
    

        echo' <div style="margin: 10px;color: white;background: green;height: 30px;
    text-align: center; 
    margin-top: -10px;" >Editado Exitosamente </div>';
    }else{
        echo' <div class="EDID" > Campos Vacios Intente Nuevamente</div>  ';
    }

    }
      



?>