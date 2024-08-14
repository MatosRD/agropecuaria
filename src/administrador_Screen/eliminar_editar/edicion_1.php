<style>
    .EDID{
        display: flex;
        width: 80%;
        justify-content:center ;
        margin: auto;         
        text-align: center;
        height: 30px;
        align-items: center;
        background: green;
        color: white;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .EDI{
        display: flex;
        width: 80%;
        justify-content:center ;
        margin: auto;         
        text-align: center;
        height: 30px;
        align-items: center;
        background: green;
        color: white;
        border-radius: 10px;
        margin-bottom: 20px;
    }
</style>
<?php
include './../../conexion_DB/Conexion.php';

if(isset($_POST["edid"])){
    if(!empty($_POST["cliente"]) and !empty($_POST["direccion"]) and !empty($_POST["logintud"]) and !empty($_POST["latitud"])
    and !empty($_POST["dia"])
    ){
        $nombrenew = $_POST['cliente'];
        $direccionnew = $_POST['direccion'];
        $dianew = $_POST['dia'];
        $longitudnew = $_POST['logintud'];
        $latitudnew = $_POST['latitud'];
    
    
        $SQL = "UPDATE cliente SET nombre = '$nombrenew', direccion = '$direccionnew', dia = '$dianew', longitud = '$longitudnew', latitud = '$latitudnew'
        WHERE id_cliente = '$id'";
        $tll = mysqli_query($conexion, $SQL);
        $cliente = $nombrenew; 
        $direccion = $direccionnew;
        $dia = $dianew;
        $latitud = $longitudnew; 
        $logintud = $latitudnew;
    

        echo' <div class="EDID" >Editado Exitosamente </div>';
    }else{
        echo' <div class="EDI" > Campos Vacios Intente Nuevamente</div>  ';
    }

    }
      



?>