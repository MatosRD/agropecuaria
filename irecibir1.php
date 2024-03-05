<?php

require('conexion_2.php');

$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(";", $linea);
       
        $id_articulo           = !empty($datos[0])  ? ($datos[0]) : '';
		$codigo                = !empty($datos[1])  ? ($datos[1]) : '';
        $descripcion           = !empty($datos[2])  ? ($datos[2]) : '';
        $cantidad              = !empty($datos[3])  ? ($datos[3]) : '';
		$unidad                = !empty($datos[4])  ? ($datos[4]) : '';
        $cantidad_v            = !empty($datos[5])  ? ($datos[5]) : '';
        $precio_c              = !empty($datos[6])  ? ($datos[6]) : '';
		$precio_v              = !empty($datos[7])  ? ($datos[7]) : '';
        $margen_g              = !empty($datos[8])  ? ($datos[8]) : '';
        $compra_p_s            = !empty($datos[9])  ? ($datos[9]) : '';
		$venta_p_n             = !empty($datos[10])  ? ($datos[10]) : '';
        

if( !empty($id_articulo) ){
    $checkemail_duplicidad = ("SELECT * FROM articulos_v1 WHERE id_articulo ='$id_articulo' ");
            $ca_dupli = mysqli_query($conexion, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);
        }   

//No existe Registros Duplicados
if ( $cant_duplicidad == 0 ) { 

$insertarData = "INSERT INTO articulos_v1( 
        id_articulo,           
		codigo,                
        descripcion,           
        cantidad,              
		unidad,                
        cantidad_v,            
        precio_c,              
		precio_v,              
        margen_g,              
        compra_p_s,            
		venta_p_n            
) VALUES(
        '$id_articulo',           
		'$codigo',                
        '$descripcion',           
        '$cantidad',              
		'$unidad',                
        '$cantidad_v',            
        '$precio_c',              
		'$precio_v',              
        '$margen_g',              
        '$compra_p_s',            
		'$venta_p_n'             
)";
mysqli_query($conexion, $insertarData);
        
} 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    $updateData =  ("UPDATE articulos_v1 SET 
        id_articulo ='" .$id_articulo. "',           
		codigo ='" .$codigo. "',                
        descripcion ='" .$descripcion. "',           
        cantidad ='" .$cantidad. "',              
		unidad ='" .$unidad. "',                
        cantidad_v ='" .$cantidad_v. "',            
        precio_c ='" .$precio_c. "',              
		precio_v ='" .$precio_v. "',              
        margen_g ='" .$margen_g. "',              
        compra_p_s ='" .$compra_p_s. "',            
		venta_p_n ='" .$venta_p_n. "'    
        WHERE id_articulo='".$id_articulo."'
    ");
    $result_update = mysqli_query($conexion, $updateData);


    } 
  }

 $i++;
 
}


?>

<div style="    display: flex;
    justify-content: center;
    height: 100vh;
    align-items: center;">
    <div style=" padding:15px 15px; border-radius: 10px; margin: 10px;  background:rgb(233, 233, 105);
    box-shadow: -16px 27px 56px -18px rgba(0,0,0,0.44);  text-align:center;" >
    <?php  echo'Importado Exitosamente'; ?><br> <br>
    <a href="administracion.php">Volver</a>
    </div>
   
</div>