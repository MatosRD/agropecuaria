<?php
    include './../conexion_DB/Conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/style.css">
    <title>Consulta</title>
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
                <li> <a href=""><img src="./../img/informe.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Reporte</span></a></li>
                <li> <a href=""><img src="./../img/grafico.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Grafico</span></a></li>
                <li> <a href="cerrar.php"><img src="./../img/salir.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Salir</span></a></li>
            </ul>
        </nav>
    </header>

    
    <div class="titul"><h1>Consulta</h1></div>

  
    <div class="buscar">
            <form action="" method="post" >
                <input type="text" name="busca" placeholder="Buscar" >
                <button id = "buscar_p" >Buscar</button>
            </form>    
    </div>

    <div class="del">
        <button><?php echo'<a href="">Eliminar Todo</a>';    ?></button>
    </div>


<div class="pedido">
    <div class="pedido_1">
        
            <?php
                $consulta = "SELECT * FROM vista ORDER BY inicio DESC";
                $sql = mysqli_query($conexion, $consulta);

                if(mysqli_num_rows($sql) > 0){
                    while($fila = mysqli_fetch_assoc($sql)){ 
                     
                        ?> 
                        <div class="car">
                            <div class=""><p></p></div>
                            <div class="borrar" style="margin-top: 20px;"><?php echo"<a href='./eliminar_editar/eliminar_consulta.php?id=".$fila['id_vista']."'
                              onclick='return confirmar()'>X</a>"; ?></div>
                            <div class="tt">
                                <h3  >Vendedor</h3>
                                    <p><?php echo $fila['nombre'];?></p>
                                <h3>Fecha</h3>
                                    <p> <?php echo $fila['inicio'];?> </p>
                                <h3 style="color:green;">Inicio</h3>
                                    <p> <?php echo $fila['fecha']; ?> </p>
                                <h3 style="color:red;">Cierre</h3>
                                    <p> <?php echo $fila['cierre']; ?> </p>
                            
                        </div>
                          
                        </div>
                    <?php } 
                } ?>

<?php 
    if(!empty("buscar_p")){ 
    if(!empty($_POST['busca'])){ 
        $bus = $_POST['busca'];
        $sentencia = "SELECT * FROM vista WHERE nombre like '$bus' or inicio = '$bus' ";
            $total = mysqli_query($conexion, $sentencia);
            if(mysqli_num_rows($total) > 0) {
                echo '<style>.pedido .pedido_1 .car{
                    display: none;}
                    </style>';
                   
                echo '<a href="consulta.php"><button  style="display:flex; color: white; background: blue;
                padding: 8px 15px; border:none; border-radius:10px;text-decoration: none;  margin-left: 30px; cursor: pointer; "> Limpiar pantalla</button></a>';
                while($fila = mysqli_fetch_assoc($total)){ ?>
              
              <div class="car1" style="margin-top: 50px;">
                           
                            <div class="borrar" style="margin-top: 20px;"><?php echo"<a href='./eliminar_editar/eliminar_consulta.php?id=".$fila['id_vista']."'
                              onclick='return confirmar()' >X</a>"; ?></div>
                            <div class="tt">
                                <h3>Vendedor</h3>
                                    <p><?php echo $fila['nombre'];?></p>
                                <h3>Fecha</h3>
                                    <p> <?php echo $fila['inicio'];?> </p>
                                <h3 style="color:green;">Inicio</h3>
                                    <p> <?php echo $fila['fecha']; ?> </p>
                                <h3 style="color:red;">Cierre</h3>
                                    <p> <?php echo $fila['cierre']; ?> </p>

                                
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