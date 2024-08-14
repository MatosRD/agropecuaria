
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
    if(!empty($_POST["codigo"]) and !empty($_POST["articulo"]) and !empty($_POST["cantidad"]) and !empty($_POST["precio_c"])
    and !empty($_POST["Precio_v"]) and !empty($_POST["ganancia"])){
        $codigonew = $_POST['codigo'];
        $articulonew = $_POST['articulo'];
        $cantidadnew = $_POST['cantidad'];
        $gananicanew = $_POST['ganancia'];
        $venta = $_POST['Precio_v'];
        $compra = $_POST['precio_c'];
    
        $SQL = "UPDATE inventario SET codigo = '$codigonew', articulo = '$articulonew', precio_venta = '$venta', precio_costo = '$compra', cantidad = '$cantidadnew', ganancia = '$gananicanew'
        WHERE id_inventario = '$id'";
        $tll = mysqli_query($conexion, $SQL);
        $codigo = $codigonew; 
        $articulo = $articulonew;
        $cantidad = $cantidadnew; 
        $ganancia = $gananicanew;
        $precio_v = $venta;
        $precio_c = $compra;

        echo' <div class="EDID" >Editado Exitosamente </div>';
    }else{
        echo' <div class="EDI" > Campos Vacios Intente Nuevamente</div>  ';
    }

    }
      



?>