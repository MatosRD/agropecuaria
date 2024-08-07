<?php
include './../conexion_DB/Conexion.php';
session_start();

$id = $_SESSION["id_vendedor"];
$nombre =  $_SESSION["nombres"];
$id = $_GET['nun'];

if(!empty(['pross'])){
    if(!empty($_POST['cliente']) and !empty($_POST['fecha'])){
        $cliente = $_POST['cliente'];
        $fecha = $_POST['fecha'];

        $actualizar = "UPDATE pedidos SET cliente = '$cliente', fecha_entrega = '$fecha', nopedido = '$id' WHERE vendedor = '$nombre'";
        mysqli_query($conexion,$actualizar);

        $ff = mysqli_query($conexion,"INSERT INTO pedidos_c SELECT * FROM pedidos");
        $aa = mysqli_query($conexion,"DELETE FROM pedidos");
         header('location: cierre.php');
    

    }else{
        echo'';
    }

}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/style.css">
    <title>Document</title>
</head>
<body>
<style>
    .conteiner{
  display: flex;
  width: 100%;
  height: 100vh;
  justify-content: center;
  align-items: center
}



.conteiner .container2{
  display:flex;
  width: 300px;
  flex-direction: column;
  height: 40%;
  border-radius: 10px;
  background: #f6f5f5;
  justify-content: center;
  align-items: center;
  box-shadow: -4px 9px 29px -13px rgba(0,0,0,0.75);
}

.conteiner .container2 h1{
    margin-bottom: 10px;
}
.conteiner .container2 input{
    padding-left: 10px;
    height: 25px;
}

.conteiner .container2 .formulario button{
    padding: 7px 10px;
    border: none;
    color: white;
    background:#6836ff ;
    border-radius: 5px;
    cursor: pointer;
}
.conteiner .container2 .formulario{
    margin-bottom: 10px;
}

</style>
<div class="conteiner"> 
    <div class="container2">
        <h1>Cliente</h1>
        <div class="formulario">
            <form action="" method="post">
                
                <div>
                    <input type="text" name="cliente" placeholder="Buscar cliente">
                    <button id="client" >Buscar</button>
                </div>
            </form>
        </div>

    <div class="tablas">
                <?php
                if(!empty("client")){ 
                    if(!empty($_POST['cliente'])){ 
                        $cliente = $_POST['cliente'];
                        $sentencia = "SELECT * FROM cliente WHERE nombre like '$cliente'";
                            $busqueda = mysqli_query($conexion, $sentencia);
                            if(mysqli_num_rows($busqueda) > 0) {
                                echo '<style>
                                    </style>';
                                
                                // echo '<a href="confirmar.php"><button  style="display:flex; color: white; background: blue;
                                // padding: 8px 15px; border:none; border-radius:10px;text-decoration: none;  margin-left: 5px; cursor: pointer; "> Limpiar pantalla</button></a>';
                                while($fila = mysqli_fetch_assoc($busqueda)){
                                    echo '<tr class="no2">';?> 
                                    <form action="" method="post" > <?php
                                        $nombre  =  $fila['nombre'];
                                        echo '<td>'; ?><input type="text"  name="cliente" value="<?php  echo $nombre;  ?>" style="border: none; background:#ddd; ">  <?php  echo '</td>';?>
                                        <div class="date" style="margin-top: 10px;">
                                            <label for="">Fecha de entrega</label>
                                            <input type="date" name="fecha">
                                        </div> 

                                    <?php  
                                        echo '<td>';  
                                        echo"<button id='pross' style='margin-top: 15px;padding: 8px 15px; background: orange; color:black; border-radius:10px; borber:none; cursor:pointer; '>Enviar</button> "  ;  
                                        echo '</td>';
                                        ?> </form> <?php 
                                echo '</tr>';
                                
                                }    
                                
                            }else{
                        

                                echo '<div class="cliente" style="margin-left: 30px;">Cliente no encotrado</div>';
                            }
                        }
                    }

                ?>

                    </tbody>
                </table>
            </div>            
        </div>   
    </div>

</body>
</html>