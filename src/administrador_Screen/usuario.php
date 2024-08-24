<?php
include './../conexion_DB/Conexion.php';

if(!empty(['ticket'])){
    if(!empty($_POST['country'])){
        $ja = $_POST['country'];
        $d = $_POST['id'];

        $estado = mysqli_query($conexion,"SELECT * FROM login_v1 WHERE id_login = '$d' ");
        while($fila = mysqli_fetch_assoc($estado)){
                $sa = mysqli_query($conexion,"UPDATE login_v1 SET estado = '$ja' WHERE id_login = '$d' "); 
                header("Location: usuario.php");
          
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/style.css">
    <title>usuario</title>
</head>
<header class="main-header">
<label for="btn-nav" class="btn-nav"  ><img src="./../img/menu.png" alt="" style="width: 20px; "></label>
<input type="checkbox" id="btn-nav">
        <nav>
            <ul class="navigation">
                <li> <a href=""> <img src="./../img/hogar.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Inventario</span></a></li>
                <li> <a href="pedidos.php"><img src="./../img/pedido.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Pedido</span></a></li>
                <li> <a href="cliente.php"><img src="./../img/cliente.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Cliente</span></a></li>
                <li> <a href=""><img src="./../img/informe.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Reporte</span></a></li>
                <li> <a href="salida_dia.php"><img src="./../img/grafico.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Salida</span></a></li>
                <li> <a href="consulta.php"><img src="./../img/vendedor.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Actividad</span></a></li>
                <li> <a href="usuario.php"><img src="./../img/perfil-del-usuario.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Usuarios</span></a></li>
                <li> <a href="cerrar.php"><img src="./../img/salir.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Salir</span></a></li>
            </ul>
        </nav>
    </header>
<body>




    <div class="user">
        <h1>Usuario</h1>
        <div class="user_1">
            <div class="img">
                <img src="./../img/perfil-del-usuario.png" alt="">
            </div>
            <div class="cotenido">
                <div class="tabl" >
                    <table>
                    <thead>
                            <tr>
                                <th>Administrador</th>
                                <th>Clave</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                
                // include './inicio_administrador.php';
                
                $mostrar_inventario = "SELECT * FROM login_v1 WHERE rol = '1' ";
                $busqueda = mysqli_query($conexion, $mostrar_inventario)
                ?>
                <?php  while($fila = mysqli_fetch_assoc($busqueda)) { ?>

                    <tr class="no1">
                    <td><?php echo $fila['usuario'] ?> </td>
                    <td ><?php echo $fila['clave'] ?> </td>
                    <td>
                        <button type="button" id="ea"><?php echo"<a href='./eliminar_editar/editar_admin.php?id=".$fila['id_login']."'>Editar</a>"; ?></button>            
                    </td>
                    </tr>    
                <?php } ?>
       
                        </tbody>
                        <thead>
                            <tr>
                                <th>Vendedor</th>
                                <th>Clave</th>
                                <th>Estado</th>
                                <th></th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                
                // include './inicio_administrador.php';
                
                $mostrar_inventario = "SELECT * FROM login_v1 WHERE rol = '2' ";
                $busqueda = mysqli_query($conexion, $mostrar_inventario)
                ?>
                <?php  while($fila = mysqli_fetch_assoc($busqueda)) { ?>
                      
                    <tr class="no1">
                        <?php $idd = $fila['id_login'] ?>
                    <td><?php echo $fila['usuario'] ?> </td>
                    <td ><?php echo $fila['clave'] ?> </td>
                    <td>
                    
                        <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $idd; ?>">
                            <label for="country">
                            <select id="country" name="country">
                                <?php
                                    $consulta = mysqli_query($conexion,"SELECT * FROM login_v1 WHERE rol = '2' ");
                                    while($fila = mysqli_fetch_assoc($consulta)){
                                    $estado = $fila['estado'];
                                
                                    if( $estado == 'activo'){   
                                        echo'<option value="">'.$estado.'</option>';
                                        echo'<option value="inactivo">inactivo</option>';
                                        
                                    }else{
                                        echo'<option value="">'.$estado.'</option>';
                                        echo'<option value="activo">activo</option>';
                                    }}?>
                            </select>
                            </label>    
                            
                            <button id="ticket" style="cursor:pointer;border-radius:10px;padding:5px 10px;color:white;background:#6836ff;borde:none;">Cambiar</button>
                         </form>
                         
                    </td>
                    <td>
                        <?php
                       
                           if($estado == 'activo'){
                            echo '<div style="width:15px;height:15px; border-radius:50%;background:green;"> </div> ';
                           }else{
                            echo '<div style="width:15px;height:15px; border-radius:50%;background:grey;"> </div> ';
                           }
                        
                        ?>
                    
                    </td>
                    <td>
                        <button type="button" id="ea"><?php echo"<a href='./eliminar_editar/editar_vend.php?id=".$idd."'>Editar</a>"; ?></button>            
                    </td>
                    </tr>    
                <?php } ?>
            
                                       
                        </tbody>
                    </table>
            
                </div>
            </div>
        </div>
    </div>
</body>
</html>