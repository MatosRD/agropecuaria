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
    <link rel="shortcut icon" href="logonew1.png" />
    <title>Administrador</title>
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

    <div class="notificacion">
        <div class="not">
           <a href="notificacion.php"><img src="./../img/campana.png" alt=""></a> 
            <div class="circul"> 
                <?php 
                 $contar = mysqli_query($conexion,"SELECT * FROM inventario WHERE cantidad <= '10'");
                
                ?>
                <div class="cent"><p><?php  echo mysqli_num_rows($contar) ?></p></div>
                
            </div>
        </div>
    </div>
</div>

    <div class="cabez">
        <div class="imagen">
            <img src="../img/logo_v2.jpg" alt="logo" >
        </div>
        <div class="text1"> 
            <h1>BIENVENIDO</h1></div>
        <div class="text">
        <h1 class="titulo" >
           <p>SR. <?php echo $_SESSION["nombres"];?> Administrador</p> 
        </h1> 
     </div>
       
     <div class="col">
       <form action="./excel_Screen/importar.php" method="POST" enctype="multipart/form-data">
         <div class="file-input text-center" >
            
             <input  type="file" name="dataCliente" id="file-input"   class="file-input__input" />
               <button id="subir"> Subir </button>
           </div>

       </form>
     </div>     
     
        <div class="buscar">
            <form action="" method="post" >
                <input type="text" name="busc" placeholder="Buscar" >
                <button id = "buscar_c" >Buscar</button>
            </form>    
        </div>
        
    </div>
  
     
    <div class="esp" style=" width:87%; margin-top:20px; ">    
        <button class= "mas"><?php echo"<a href='./agregar_Screen/agregar_articulo.php'>+</a>"; ?> </button>  
        <button class= "meno" ><?php echo"<a href='./excel_Screen/excel_articulos.php'>Excel</a>"; ?> </button>  
    </div> 

    
    <div class="tabl" style="display:flex;  flex-direction:column;" >
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Vendida <a href="./eliminar_editar/limpiar_cant.php" style="color:white; " ><img src="./../img/borrar.png" style="width: 20px; color:red;" alt="Limpiar"></a> </ht>
                    <th>Precio de compra</th>
                    <th>Precio de venta</th>
                    <th>Ganancia</th>
                    <th>accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                // include './inicio_administrador.php';
                
                $mostrar_inventario = "SELECT * FROM inventario ORDER BY cantidad ASC ";
                $busqueda = mysqli_query($conexion, $mostrar_inventario)
                ?>
                <?php  while($fila = mysqli_fetch_assoc($busqueda)) { ?>

                    <tr class="no1">
                    <td><?php echo $fila['codigo'] ?> </td>
                    <td ><?php echo $fila['articulo'] ?> </td>
                    <td><?php echo $fila['cantidad'] ?> </td>
                    <td style="background:#9c99fc; color:white; color:black; "><?php echo $fila['cantidad_vendida']; ?> </td>
                    <td><?php echo number_format($fila['precio_costo'],2); ?> </td>
                    <td><?php echo number_format($fila['precio_venta'],2); ?> </td>
                    <td><?php echo number_format($fila['ganancia'],2); ?> </td>
                    <td>
                        <button type="button" id="ea"><?php echo"<a href='./eliminar_editar/editar_inventario.php?id=".$fila['id_inventario']." '
                        >Editar</a>"; ?></button>            
    <br>
                        <button type="button" id="ex"><?php echo"<a href='./eliminar_editar/eliminar_inventario.php?id=".$fila['id_inventario']." '
                        onclick='return confirmar()' >ELIMINAR</a>"; ?></button>
                    </td>
                    </tr>    
                <?php } ?>

                <?php 
    if(!empty("buscar_c")){ 
    if(!empty($_POST['busc'])){ 
        $bus = $_POST['busc'];
        $sentencia = "SELECT * FROM inventario WHERE articulo like '%$bus%' or codigo = '$bus' ";
            $total = mysqli_query($conexion, $sentencia);
            if(mysqli_num_rows($total) > 0) {
                echo '<style>.tabl table .no1{
                    display: none;
                    }
                    </style>';
                   
                echo '<a href="./inicio_administrador.php" style="margin-top:40px;"><button  style="display:flex; color: white; background: blue;
                padding: 8px 15px; border:none; border-radius:10px;text-decoration: none;  margin-left: 40px; cursor: pointer; "> Limpiar pantalla</button></a>';
                while($fila = mysqli_fetch_assoc($total)){
                    echo '<tr class="no2">';   
                        
                        echo '<td>'; echo $fila['codigo']; echo '</td>';
                        echo '<td>'; echo $fila['articulo']; echo '</td>';
                        echo '<td>'; echo $fila['cantidad']; echo '</td>';
                        echo '<td>'; echo $fila['cantidad_vendida']; echo '</td>';
                        echo '<td>'; echo number_format($fila['precio_costo'],2); echo '</td>';
                        echo '<td>'; echo number_format($fila['precio_venta'],2); echo '</td>';
                        echo '<td>'; echo number_format($fila['ganancia'],2); echo '</td>';
                        echo '<td>'; echo" <button id='ea'><a href='./eliminar_editar/eliminar_inventario.php?id=".$fila['id_inventario']."  ' 
                        onclick='return confirmar()'  >Eliminar</a></button>
                        
                       <button id='ex' > <a href='./eliminar_editar/editar_inventario.php?id=".$fila['id_inventario']." ' 
                        '  >Editar</a> </button>"
                        ; echo '</td>';

                echo '</tr>';
                
                 }    
                 
            }else{
                echo '<div class="cliente" style="margin-left: 30px;">articulo no encotrado</div>';
            }
        }
    }
    ?>       

                            
            </tbody>
        </table>

    </div>
    </div>    

    
  
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