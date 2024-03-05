<?php
session_start();
if(empty($_SESSION["id"]) or $_SESSION["roles"] == 2 ){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="logonew1.png" />
    <title>Administrador</title>
    <script> function confirmar(){
    return confirm('¿Estas seguro de eliminar los datos?');
    }</script>
</head>
<body>

<div class="container">
<div class="nav">
    <div class="nav_sub">
        <ul>
            <li><a href="deuda1.php">CxC <span class="xp">❌</span></a></li>
            <li><a href="Datos.php">Cuadre <span class="xp">📊</span></a></li>
            <li><a href="factura_A.php">Facturas <span class="xp">📈</span></a></li>
            <li><a href="agregar.php">Agregar <span class="xp">📋</span></a></li>
            <li><a href="administracion.php">Inicio <span class="xp">🏠</span></a></li>
            <li><a href="cerrar.php"  ><img src="salir.png" alt="" id="fifa" style="width: 35px;"></a></li>
        </ul>
        
       
    </div>
</div>

<a href="cerrar.php"><img src="salir_1.png" alt="" id="RR" style="width: 35px;  " ></a>

<a href="user.php"><img src="user.png" alt="" style="width: 40px; margin:10px; cursor:pointer; "></a>

<div class="menu">
                <img src="menu.png" id="icono_menu">
            </div>
    <div class="cabez">
        <div class="imagen">
            <img src="logo.png" alt="logo">
        </div>
        <div class="text1"> <h1>BIENVENIDO</h1></div>
        <div class="text">
        <h1 class="titulo" >--<?php echo $_SESSION["nombres"];?> Hector Peralta--</h1> 
        
        </div>
       
                
        <div class="buscar">
            <form action="" method="post" >
                <input type="text" name="busc" placeholder="Buscar" >
                <button id = "buscar_c" >Buscar</button>
            </form>    
        </div>
        
    </div>
    <div class="col">
       <form action="irecibir1.php" method="POST" enctype="multipart/form-data"/>
         <div class="file-input text-center" >
             <input  type="file" name="dataCliente" id="file-input"   class="file-input__input" />
               <input type="submit" name="subir" class="btn-enviar" value="Subir"/>
           </div>

       </form>
     </div>
    <div class="esp" >    
                <button class="expol" id="exportar" > <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6haxy9msNwQTYsXA0smDuQcZianV3ukVaIQ&usqp=CAU" alt="" style="width: 40px;" ><?php echo"<a href='expor4.php'>Exportar Exel</a>"; ?> </button>
                   <button class="pdf"><img src="https://cdn4.iconfinder.com/data/icons/logos-and-brands/512/27_Pdf_File_Type_Adobe_logo_logos-512.png" alt="" style="width: 30px;" > <?php echo"<a href=' pdffinal.php' target='_blank'>Exportar PDF</a>"; ?>  </button> 
    </div> 

    
    <div class="tabl" >
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Descripcion</ht>
                    <th>Cantidad</ht>
                    <th>Unidad</th>
                    <th>Cantidad Vendida <a href="lp.php" style="color:white; " ><img src="https://cdn-icons-png.flaticon.com/512/4734/4734087.png" style="width: 20px;" alt="Limpiar"></a> </ht>
                    <th>Precio de compra</th>
                    <th>Precio de venta</ht>
                    <th>Margen Ganancia</ht>
                    <th>compra prod, suplid...</ht>
                    <th>Venta prod, negocio</ht>
                    <th>accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'conexion_2.php';
                
                $mostrar_a = "SELECT * FROM articulos_v1 ORDER BY cantidad ASC ";
                $total = mysqli_query($conexion, $mostrar_a)
                ?>
                <?php  while($fila = mysqli_fetch_assoc($total)) { ?>

                    <tr class="no1">
                    <td><?php echo $fila['codigo'] ?> </td>
                    <td ><?php echo $fila['descripcion'] ?> </td>
                    <td><?php echo $fila['cantidad'] ?> </td>
                    <td><?php echo $fila['unidad'] ?> </td>
                    <td style="background:#9c99fc; color:white; color:black; "><?php echo $fila['cantidad_v']; ?> </td>
                    <td><?php echo number_format($fila['precio_c'],2); ?> </td>
                    <td><?php echo number_format($fila['precio_v'],2); ?> </td>
                    <td><?php echo number_format($fila['margen_g'],2); ?> </td>
                    <td><?php echo number_format($fila['compra_p_s'],2); ?> </td>
                    <td><?php echo number_format($fila['venta_p_n'],2); ?> </td>
                    <td>
                        <button type="button" id="ea"><?php echo"<a href='editar.php?id=".$fila['id_articulo']." '
                        >Editar</a>"; ?></button>            
    <br>
                        <button type="button" id="ex"><?php echo"<a href='eliminar.php?id=".$fila['id_articulo']." '
                        onclick='return confirmar()' >ELIMINAR</a>"; ?></button>
                    </td>
                    </tr>    
                <?php } ?>

                <?php 
    if(!empty("buscar_c")){ 
    if(!empty($_POST['busc'])){ 
        $bus = $_POST['busc'];
        $sentencia = "SELECT * FROM articulos_v1 WHERE descripcion like '%$bus%' or codigo = '$bus' ";
            $total = mysqli_query($conexion, $sentencia);
            if(mysqli_num_rows($total) > 0) {
                echo '<style>.tabl table .no1{
                    display: none;
                    }
                    </style>';
                   
                echo '<a href="administracion.php"><button  style="display:flex; color: white; background: blue;
                padding: 8px 15px; border:none; border-radius:10px;text-decoration: none;  margin-left: 30px; cursor: pointer; "> Limpiar pantalla</button></a>';
                while($fila = mysqli_fetch_assoc($total)){
                    echo '<tr class="no2">';   
                        
                        echo '<td>'; echo $fila['codigo']; echo '</td>';
                        echo '<td>'; echo $fila['descripcion']; echo '</td>';
                        echo '<td>'; echo $fila['cantidad']; echo '</td>';
                        echo '<td>'; echo $fila['unidad']; echo '</td>';
                        echo '<td>'; echo $fila['cantidad_v']; echo '</td>';
                        echo '<td>'; echo number_format($fila['precio_c'],2); echo '</td>';
                        echo '<td>'; echo number_format($fila['precio_v'],2); echo '</td>';
                        echo '<td>'; echo number_format($fila['margen_g'],2); echo '</td>';
                        echo '<td>'; echo number_format($fila['compra_p_s'],2); echo '</td>';
                        echo '<td>'; echo number_format($fila['venta_p_n'],2); echo '</td>';
                        echo '<td>'; echo" <a href='eliminar.php?id=".$fila['id_articulo']." ' 
                        onclick='return confirmar()' class='aa' >Eliminar</a>
                        
                        <a href='editar.php?id=".$fila['id_articulo'].  "' 
                        ' class='ab' >Editar</a>"
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
        document.getElementById("icono_menu").addEventListener("click", menu_menu);
        function menu_menu(){
            document.querySelector(".nav_sub").classList.toggle("menu_menu")
        }

    </script>

</body>
</html>