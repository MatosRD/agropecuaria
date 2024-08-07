<?php
include './../../conexion_DB/Conexion.php';

if(!empty(['pp'])){
    if(!empty($_POST['codigo'])){
        $codigo = $_POST['codigo'];
        $articulo = $_POST['articulo'];
        $cantidad = $_POST['cantidad'];
        $costo = $_POST['costo'];
        $venta = $_POST['venta'];
        $ganancia = $_POST['ganancia'];


        $varidar = mysqli_query($conexion, "SELECT * FROM inventario WHERE codigo = '$codigo'");    
        $cant_duplicidad = mysqli_num_rows($varidar);

            if($cant_duplicidad == 0){

            $insertar = "INSERT INTO inventario (codigo, articulo, precio_costo, precio_venta, cantidad, ganancia) 
            VALUES ('$codigo','$articulo','$costo','$venta','$cantidad','$ganancia')";

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