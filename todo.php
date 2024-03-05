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
    <title>Factura</title>
</head>
<body>
    
    <div class="container">
        <div class="nav">
            <div class="nav_sub">
                <ul>
                <li><a href="deuda1.php">CxC❌</a></li>
            <li><a href="Datos.php">Cuadre📊</a></li>
            <li><a href="factura_A.php">Facturas📈</a></li>
            <li><a href="agregar.php">Agregar📋</a></li>
            <li><a href="administracion.php">Inicio🏠</a></li>
            <li><a href="cerrar.php"><img src="salir.png" alt="" id="fifa" style="width: 35px;"></a></li>
        </ul>
      
            </div>
        </div>
        <a href="cerrar.php"><img src="salir_1.png" alt="" id="RR" style="width: 35px;" ></a>
        
        <div class="menu">
                <img src="menu.png" id="icono_menu">
            </div>

        <div class="linea3">
            <h1>Factura</h1>
        </div>

        <div class="mostrar1"  >
            <button><a href="factura_A.php">Mostrardo las ultimas 25 Factura</a></button>
            <button style="background: red;" ><a href="eliminar_t.php">Borrar Todas factura</a></button>
            <button style="padding: 20px; border:1px solid black; background:green; border:none;  " > <h1>Total Vendito:</h1><?php         include 'conexion_2.php';
            $total = 0 ; 
            $nart = mysqli_query($conexion,"SELECT * FROM facturacion_venta_1");
            while($fila = mysqli_fetch_assoc($nart)){
            $sun = $fila['sub'];
            $total += $sun;
        }   echo'<h1>RD ';  echo  number_format( $total, 2);  echo'</h1>' ; ?>  </button>
        </div>
          
            
        
    <div class="esp" style="margin-bottom: -95px;" >    
                <button class="expol" id="exportar" > <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6haxy9msNwQTYsXA0smDuQcZianV3ukVaIQ&usqp=CAU" alt="" style="width: 40px;" ><?php echo"<a href='exporf2.php'>Exportar Exel</a>"; ?> </button>
                   <button class="pdf"><img src="https://cdn4.iconfinder.com/data/icons/logos-and-brands/512/27_Pdf_File_Type_Adobe_logo_logos-512.png" alt="" style="width: 30px;" > <?php echo"<a href='exel3.php' target='_blank'>Exportar PDF</a>"; ?>  </button> 
    </div> 

          <div class="fac" >
                <table class="um" >
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Descripcion</ht>
                            <th>Cantidad</ht>
                            <th>Precio</th>
                            <th>Fecha</th>
                            <th>Itbis</th>
                            <th>Subtotal</ht>
                            <th>accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                include 'conexion_2.php';
                
                $mostrar_a = "SELECT * FROM facturacion_venta_1";
                $total = mysqli_query($conexion, $mostrar_a)
                ?>
                <?php  while($fila = mysqli_fetch_assoc($total)) { ?>

                    <tr class="no1">
                    <td><?php echo $fila['codigo'] ?> </td>
                    <td><?php echo $fila['descripcion_f'] ?> </td>
                    <td><?php echo $fila['cantidad_f'] ?> </td>
                    <td><?php echo $fila['precio_f'] ?> </td>
                    <td><?php echo $fila['fecha'] ?> </td>
                    <td><?php echo $fila['itbis'] ?> </td>
                    <td><?php echo $fila['sub'] ?> </td>
                    <td>
                        <button type="button" id="ex"><?php echo"<a href='eliminar.php?id=".$fila['id_factura_venta']." '
                        onclick='return confirmar()' >ELIMINAR</a>"; ?></button>
                    </td>
                    </tr>    
                <?php } ?>

                                    
                    </tbody>
                </table>


                <script>
        document.getElementById("icono_menu").addEventListener("click", menu_menu);
        function menu_menu(){
            document.querySelector(".nav_sub").classList.toggle("menu_menu")
        }

    </script>
</body>
</html>