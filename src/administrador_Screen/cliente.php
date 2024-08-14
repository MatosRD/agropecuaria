<?php
session_start();
if(empty($_SESSION["id"]) or $_SESSION["roles"] == 2 ){
    header("location: ../login/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/style.css">
    <link rel="shortcut icon" href="logonew1.png" />
    <title>Cliente</title>
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
</div>


<div class="titul"><h1>Cliente</h1></div>
<div class="col" style="margin-top: 10px;">
       <form action="./excel_Screen/importar_cliente.php" method="POST" enctype="multipart/form-data">
         <div class="file-input text-center" >
            
             <input  type="file" name="dataCliente" id="file-input"   class="file-input__input" />
               <button id="subir"> Subir </button>
           </div>

       </form>
     </div>

    <div class="cabez">              
        <div class="buscar">
            <form action="" method="post" >
                <input type="text" name="busc" placeholder="Buscar" >
                <button id = "buscar_c" >Buscar</button>
            </form>    
        </div>
    </div>
   

     
    <div class="esp" style="margin-top: 10px;" >    
    <button style="margin-left: 200px; background: blue; border: none; border-radius: 5px;"><?php echo"<a href='./agregar_Screen/agregar_cliente.php'>+</a>"; ?> </button>  
           <button style="background: green; border: none; border-radius: 5px;"><?php echo"<a href='./excel_Screen/excel_cliente.php'>Excel</a>"; ?> </button>  
       </div> 

    
    <div class="tabl" style="flex-direction: column; width:87%;">
        <table>
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Direccion</th>
                    <th>Dia</th>
                    <th>Longitud</th>
                    <th>Latitud</th>
                    <th>accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include './../conexion_DB/Conexion.php';
                //  include './agregar_Screen/agregar_cliente.php';
                
                $mostrar_inventario = "SELECT * FROM cliente ";
                $busqueda = mysqli_query($conexion, $mostrar_inventario)
                ?>
                <?php  while($fila = mysqli_fetch_assoc($busqueda)) {  ?>

                    <tr class="no1">
                    <td><?php echo $fila['nombre'] ?> </td>
                    <td ><?php echo $fila['direccion'] ?> </td>
                    <td ><?php echo $fila['dia'] ?> </td>
                    <td><?php echo $fila['longitud'] ?> </td>
                    <td><?php echo $fila['latitud'] ?> </td>
                    <td>
                        <button type="button" id="ea"><?php echo"<a href='./eliminar_editar/editar_cliente.php?id=".$fila['id_cliente']." '
                        >Editar</a>"; ?></button>            
    <br>
                        <button type="button" id="ex"><?php echo"<a href='./eliminar_editar/eliminar_cliente.php?id=".$fila['id_cliente']." '
                        onclick='return confirmar()' >ELIMINAR</a>"; ?></button>
                    </td>
                    </tr>    
                <?php } ?>

                <?php 
    if(!empty("buscar_c")){ 
    if(!empty($_POST['busc'])){ 
        $bus = $_POST['busc'];
        $sentencia = "SELECT * FROM cliente WHERE nombre like '%$bus%' = '$bus' ";
            $total = mysqli_query($conexion, $sentencia);
            if(mysqli_num_rows($total) > 0) {
                echo '<style>.tabl table .no1{
                    display: none;
                    }
                    </style>';
                   
                echo '<a href="./cliente.php"><button  style="display:flex; color: white; background: blue;
                padding: 8px 15px; border:none; border-radius:10px;text-decoration: none;  margin-left: 30px; cursor: pointer; "> Limpiar pantalla</button></a>';
                while($fila = mysqli_fetch_assoc($total)){
                    echo '<tr class="no2">';   
                        
                        echo '<td>'; echo $fila['nombre']; echo '</td>';
                        echo '<td>'; echo $fila['direccion']; echo '</td>';
                        echo '<td>'; echo $fila['dia']; echo '</td>';
                        echo '<td>'; echo $fila['longitud']; echo '</td>';
                        echo '<td>'; echo $fila['latitud']; echo '</td>';
                        echo '<td   >'; echo" 
                         <button id='ea'>
                         <a href='./eliminar_editar/editar_cliente.php?id=".$fila['id_cliente']." ' 
                        ' class='ea' >Editar</a>
                         <button>
                        
                        <button id='ex'style='margin-left:10px;'><a href='./eliminar_editar/eliminar_cliente.php?id=".$fila['id_cliente']."  ' 
                        onclick='return confirmar()' class='aa' >Eliminar</a> <button>
                        
                       "
                        ; echo '</td>';

                       


                echo '</tr>';
                
                 }    
                 
            }else{
        

                echo '<div class="cliente" style="margin-left: 30px; margin-top:30px;">Cliente no encotrado</div>';
            }
        }
    }
    ?>       

                            
            </tbody>
        </table>

    </div>
    </div>    

    
    <!-- <script>
        document.getElementById("icono_menu").addEventListener("click", menu_menu);
        function menu_menu(){
            document.querySelector(".nav_sub").classList.toggle("menu_menu")
        }

    </script> -->

</body>
</html>