<?php  

include './../../conexion_DB/Conexion.php';

$id = $_GET['id'];

$consulta = "SELECT * FROM pedidos_c WHERE nopedido = '$id'";
$sql = mysqli_query($conexion, $consulta);

                if(mysqli_num_rows($sql) > 0){
                    while($fila = mysqli_fetch_assoc($sql)){
                            $estado = $fila['estado'];
                            if($estado == 'activo'){
                                echo'<div id="del"  style=" width: 100%;
                                height: 100vh;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                " >';
                                    echo'<div class="dell">
                                        <p>no se puede eliminar la card antes debes eliminar todos los productos del pedido o cerrado el estado del pedido...<p>
                                        <button style="width: 100%; justify-content: center; padding:10px; background:blue;border:none; color:white;cursor:pointer;"><a href="./../pedidos.php" style="text-decoration: none; color:white;" >Volver</a></button>
                                    </div>';
                                echo'</div>';
                            }else{  
                                $delete = "DELETE FROM pedidos_c WHERE nopedido ='$id'";
                                $resul = mysqli_query($conexion, $delete);
                                header("Location: ./../pedidos.php");
                            }
                            
                    }
                }





?>