<?php
session_start();
if(empty($_SESSION["id"]) or $_SESSION["roles"] == 2 ){
    header("location: ../login/login.php");
}
    include './../conexion_DB/Conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/style.css">
    <title>Pedidos</title>
    <script> function confirmar(){
    return confirm('¿Estas seguro de eliminar los datos?');
    }</script>
</head>
<body>

<header class="main-header">
<label for="btn-nav" class="btn-nav"  ><img src="./../img/menu.png" alt="" style="width: 20px; "></label>
<input type="checkbox" id="btn-nav">
        <nav>
            <ul class="navigation">
                <li> <a href="inicio_administrador.php"> <img src="./../img/hogar.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Inventario</span></a></li>
                <li> <a href="pedidos.php"><img src="./../img/pedido.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Pedido</span></a></li>
                <li> <a href="cliente.php"><img src="./../img/cliente.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Cliente</span></a></li>
                <li> <a href="reportes.php"><img src="./../img/informe.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Reporte</span></a></li>
                <li> <a href=""><img src="./../img/grafico.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Grafico</span></a></li>
                <li> <a href="consulta.php"><img src="./../img/vendedor.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Actividad</span></a></li>
                <li> <a href="usuario.php"><img src="./../img/perfil-del-usuario.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Usuarios</span></a></li>
                <li> <a href="cerrar.php"><img src="./../img/salir.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Salir</span></a></li>
            </ul>
        </nav>
    </header>

    
    <div class="titul"><h1>Pedidos</h1></div>

  
    <div class="buscar">
            <form action="" method="post" >
                <input type="text" name="busca" placeholder="Buscar" >
                <button id = "buscar_p" >Buscar</button>
            </form>    
    </div>

    <div class="del">
       <button style=" padding: 10px 10px;border: none;background: green;color: white;"> <a href="pedidos.php">activo/cerrado</a></button>
       
    </div>


<div class="pedido">
    <div class="pedido_1">
        
            <?php
                $consulta = "SELECT DISTINCT cliente, fecha_entrega, nopedido, estado FROM espera";
                $sql = mysqli_query($conexion, $consulta);

                if(mysqli_num_rows($sql) > 0){
                    while($fila = mysqli_fetch_assoc($sql)){ 
                        $nop = $fila['nopedido'];
                        $contar = mysqli_query($conexion,"SELECT * FROM espera WHERE nopedido = '$nop' ");
                        $cant  = 0;
                        while($fila_contar  = mysqli_fetch_assoc($contar)){
                            $cant += $fila_contar ['cantidad'];
                        }
                        ?> 
                        <div class="car">
                            <div class="contar"><p><?php echo $cant  ?></p></div>
                            <div class="tt">
                                <h3  >NoPedido</h3>
                                <p><?php echo $fila['nopedido'];?></p>
                                <h3>Fecha de entrega</h3>
                                    <p> <?php echo $fila['fecha_entrega'];?> </p>
                                <h4>Cliente</h4>
                                    <p> <?php echo $fila['cliente']; ?> </p>

                                    <button><?php echo"<a href='detalles_esp.php?id=".$fila['nopedido']."'>Detalles</a>"; ?></button>
                                <div class="estado"><?php 
                                $cliente = $fila['estado']; 
                                if($cliente == 'espera'){
                                    echo '<p style="color: grey; font-weight:800; " >' .$cliente. '</p>';
                                }else{
                                    echo '<p style="color: red; font-weight:800; " >' .$cliente. '</p>';
                                }
                                 ?> </div>
                            </div>
                          
                        </div>
                    <?php } 
                } ?>

<?php 
    if(!empty("buscar_p")){ 
    if(!empty($_POST['busca'])){ 
        $bus = $_POST['busca'];
        $sentencia = "SELECT * FROM espera WHERE nopedido like '$bus' or cliente = '$bus' ";
            $total = mysqli_query($conexion, $sentencia);
            if(mysqli_num_rows($total) > 0) {
                echo '<style>.pedido .pedido_1 .car{
                    display: none;}
                    </style>';
                   
                echo '<a href="pedidos.php"><button  style="display:flex; color: white; background: blue;
                padding: 8px 15px; border:none; border-radius:10px;text-decoration: none;  margin-left: 30px; cursor: pointer; "> Limpiar pantalla</button></a>';
                while($fila = mysqli_fetch_assoc($total)){ ?>
              
              <div class="car1" style="margin-top: 50px;">
                            <div class="contar"><p><?php echo mysqli_num_rows($contar)  ?></p></div>
                            <div class="tt">
                                <h3  >NoPedido</h3>
                                <p><?php echo $fila['nopedido'];?></p>
                                <h3>Fecha de entrega</h3>
                                    <p> <?php echo $fila['fecha_entrega'];?> </p>
                                <h4>Cliente</h4>
                                    <p> <?php echo $fila['cliente']; ?> </p>

                                    <button><?php echo"<a href='destalles.php?id=".$fila['nopedido']."'>Detalles</a>"; ?></button>
                                    <div class="estado"><?php 
                                $cliente = $fila['estado']; 
                                if($cliente == 'espera'){
                                    echo '<p style="color: grey; font-weight:800; " >' .$cliente. '</p>';
                                }else{
                                    echo '<p style="color: red; font-weight:800; " >' .$cliente. '</p>';
                                }
                                 ?> </div>
                            </div>
                          
                        </div>


                <?php
                 }    
                 
            }else{
                echo '<div class="cliente" style="margin-left: 30px;">articulo no encotrado</div>';
            }
        }
    }
    ?>       
    </div>
</div>




</body>
</html>