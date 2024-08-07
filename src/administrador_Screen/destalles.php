<?php 
session_start();
include './../conexion_DB/Conexion.php';
$id = $_GET['id'];


if(!empty(['ticket'])){
    if(!empty($_POST['country'])){
        $ja = $_POST['country'];

        $estado = mysqli_query($conexion,"SELECT * FROM pedidos_c WHERE nopedido = '$id' ");
        while($fila = mysqli_fetch_assoc($estado)){
            if($ja == 'espera'){
                $sa = mysqli_query($conexion,"UPDATE pedidos_c SET estado = '$ja' WHERE nopedido = '$id' "); 
                $ff = mysqli_query($conexion," INSERT INTO espera SELECT * FROM pedidos_c WHERE nopedido = '$id'");
                $f = mysqli_query($conexion," DELETE FROM pedidos_c WHERE nopedido = '$id'");
                header("Location: pedidos.php");
            }else{
                $sa = mysqli_query($conexion,"UPDATE pedidos_c SET estado = '$ja' WHERE nopedido = '$id' ");      
                header("Location: pedidos.php");
            }
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
    <title>Document</title>
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
                <li> <a href="./cliente.php"><img src="./../img/cliente.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Cliente</span></a></li>
                <li> <a href=""><img src="./../img/informe.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Reporte</span></a></li>
                <li> <a href=""><img src="./../img/grafico.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Grafico</span></a></li>
                <li> <a href="cerrar.php"><img src="./../img/salir.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Salir</span></a></li>
            </ul>
        </nav>
    </header>
<div class="titulop">
        <h1>Destalles</h1>
            <div class="esta">
            <form action="" method="post">
            <label for="country">
                <select id="country" name="country">
                    <?php
                        $consulta = mysqli_query($conexion,"SELECT * FROM pedidos_c WHERE nopedido = '$id' ");
                        while($fila = mysqli_fetch_assoc($consulta)){
                           $estado = $fila['estado'];
                       
                           if( $estado == 'activo'){   
                            echo'<option value="">'.$estado.'</option>';
                            echo'<option value="cerrado">cerrado</option>';
                            echo'<option value="espera">espera</option>';
                        }else{
                            echo'<option value="">'.$estado.'</option>';
                            echo'<option value="activo">activo</option>';
                        }}
                    ?>
                </select>
            </label>    
            <button id="ticket">Cambiar</button>
            
        </form>
            </div>
    </div>
<div class="tabl" >
    <?php  
    $suma = mysqli_query($conexion,"SELECT SUM(sub_total) FROM pedidos_c WHERE nopedido = '$id'");  
    $row = mysqli_fetch_row($suma);
    $sumat = $row[0];

    $descuento = mysqli_query($conexion,"SELECT SUM(descuento) FROM pedidos_c WHERE nopedido = '$id'");  
    $nn = mysqli_fetch_row($descuento);
    $descuentot = $nn[0];

    $total = $sumat - $descuentot;

    ?>

  
    
        <table style="width: 80%;" >
            <thead>
            <tr>
                    <th>TOTAL</th>
                    <th  style="background: white; color:black;"><?php  echo $descuentot ?></th>
                    <th style="background: white; color:black;"><?php  echo $sumat ?></th>
                    <th style="background: white; color:black;"><?php  echo number_format($total,2) ?></th>
                    <th style="background: green;" >Imprimir</th>
                    
                </tr>
                <tr>
                    <th>Articulo</th>
                    <th>cantidad</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Subtotal</th>
                    <th>accion</th>
                </tr>
            </thead>
            <tbody>
                <?php            
                    $consulta = "SELECT * FROM pedidos_c WHERE nopedido = '$id'";
                    $sql = mysqli_query($conexion, $consulta);
                ?>
                <?php  while($fila = mysqli_fetch_assoc($sql)) { 

                    $pp = $fila['id_pedidos'];

                    
                    
                    ?>

                    <tr class="no1">
                    <td><?php echo $fila['articulo'] ?> </td>
                    <td ><?php echo $fila['cantidad'] ?> </td>
                    <td><?php echo $fila['precio_venta'] ?> </td>
                    <td>
                        <?php  number_format($descuente = $fila['descuento']);  ?>
                    <button  > <?php echo "<a href='./eliminar_editar/editar_d.php?id=".$fila['id_pedidos']."'> $descuente </a>" ?></button>
                    </td>
                    <td><?php echo number_format($fila['sub_total'],2); ?> </td>
                    <td>
                   <?php echo" <a style='padding:5px 10px;background:red;color:white;border-radius:5px;text-decoration:none;'href='./eliminar_editar/eliminar_detalles.php?id=".$fila['id_pedidos']."'
                    onclick='return confirmar()'>Eliminar</a> "?>
                    </td>
                    </tr>    
                <?php } 
                
              
             
                  
                
                
                ?>   

            </tbody>
        </table>

    </div>
    
<!-- 
    <div id="myModal" class="modal">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <form action="" method="post">
                                       
                                            <input type="text" name="desc" placeholder="Descuento">
                                        
                                            <button id="contar">descontar</button>
                                    </form>
                                </div>
                             </div> -->


                             <script>
    var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>