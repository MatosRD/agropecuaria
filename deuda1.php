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
    <title>CxC</title>
    <script> function confirmar(){
    return confirm('¿Estas seguro de eliminar los datos?');
    }</script>
</head>
<body>
    



<div class="container">
<div class="nav">
    <div class="nav_sub">
        <ul>
        <li><a href="deuda1.php">CxC❌</a></li>
            <li><a href="Datos.php">Datos📊</a></li>
            <li><a href="factura_A.php">Facturas📈</a></li>
            <li><a href="agregar.php">Agregar📋</a></li>
            <li><a href="administracion.php">Inicio🏠</a></li>
            <li><a href="cerrar.php"><img src="salir.png" alt="" id="fifa" style="width: 35px;"></a></li>
        </ul>
       
    </div>
</div>



<a href="cerrar.php"><img src="salir.png" alt="" id="RR" style="width: 35px;" ></a>
        
        <div class="menu">
                <img src="menu.png" id="icono_menu">
            </div>

<div class="cuentax">


    <div class="cuentax1">
    <h1>Cuenta X Cobrar</h1>
    <?php  

include 'conexion_2.php';

$todo = mysqli_query($conexion,"SELECT * FROM deuda_1");
$sun = 0 ;
while($fila = mysqli_fetch_assoc($todo)){
   
    
        $a = $fila['abonacion'];
        $ds = $fila['sub_d'];
        $sun += $ds;
    }

    $mostrar_a = "SELECT  distinct abonacion FROM deuda_1  ";    
    $total = mysqli_query($conexion, $mostrar_a);

    $tt = 0;
    while($filas = mysqli_fetch_assoc($total)) {  

        
         $nb = $filas['abonacion']; 
        $tt += $nb;
    } 
    $rel = $sun - $tt;

echo '<h1>RD '. $rel. '.00</h1>';
 
?>
</div>
</div>



<div class="max">
        <div class="max1">
            <form action="" method="post" >
                <h1>Abonacion</h1>
                <?php include 'abonar.php'; ?>
                <input type="text" name="nom_c" placeholder="Nombre, Cliente"  >
                <input type="text" id="top" name="cre_c" placeholder="Credito" >
                <button id="WWW" >Ingresar</button>
            </form>
        </div>
        <div class="max1">
            <form action="" method="post" >
                <h1>Nuevo Cliente <span><a  id="yin" href="agregar_cliente.php">Agregar Articulos++</a></span> </h1>
             
                <?php include 'agre_client1.php'; ?>
                <input type="text" name="nom_cliente" placeholder="Nombre, Cliente"  >
                <input type="text" id="top" name="cedula_cliente" placeholder="Credito" >
                <button id="PP" >Ingresar</button>
            </form>
        </div>
    </div>


    <div class="esp" style="margin-bottom: -70px;  " >    
                <button class="expol" id="exportar" > <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6haxy9msNwQTYsXA0smDuQcZianV3ukVaIQ&usqp=CAU" alt="" style="width: 40px;" ><?php echo"<a href='exportal1.php'>Exportar Exel</a>"; ?> </button>
                   <button class="pdf"><img src="https://cdn4.iconfinder.com/data/icons/logos-and-brands/512/27_Pdf_File_Type_Adobe_logo_logos-512.png" alt="" style="width: 30px;" > <?php echo"<a href=' pdf_1.php' target='_blank'>Exportar PDF</a>"; ?>  </button> 
    </div> 




<div class="fac" >
        <table  >
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Fecha abonacion</th>
                    <th>Abonacion</th>
                    <th>Cueta a Pagar</th>
                    <th>Deuda</th>
                    <th>Estado</th>
                    <th>Accion</th>

                </tr>
            </thead>
            <tbody>


            
                <?php
                include 'conexion_2.php';
                $mostrar_a = "SELECT  distinct nombre_d, cedula ,fecha_a ,abonacion ,deuda FROM deuda_1  ";
                $total = mysqli_query($conexion, $mostrar_a);
                
                while($fila = mysqli_fetch_assoc($total)) { $ff = 0 ; ?>
                <tr>
                    
                    <form action="" method="post">
                    <td><?php echo $nb = $fila['nombre_d']  ?> </td>
                    <td><?php echo $fila['cedula']  ?></td>
                    <td><?php echo $fila['fecha_a']  ?></td>
                    <td><?php echo $abon = $fila['abonacion']  ?></td>

                    <?php  
                    $most = mysqli_query($conexion, "SELECT * FROM deuda_1 WHERE nombre_d = '$nb' ");
                    while($filas = mysqli_fetch_assoc($most)){
                        
                        $ds = $filas['sub_d'];
                        $ff += $ds;
                    }
                    ?>
                    <td><?php echo $ff ?></td>
                    
                    <td><?php echo $xx =  $fila['deuda']  ?></td>
                
                     <?php if($xx == 0  and $ff == $abon ){ 
                    echo '<td  style="background: green; color:white;" > Pagado</td> ';
                     }else{
                    echo '<td  style="background: red; color:white;" > Deuda</td> ';
                    }?>
                    <td>
                        <button type="button" id="ea"><?php echo"<a href='deuda.php?id=".$fila['nombre_d']." '
                        >Detalles</a>"; ?></button>            
                            <br>
                        <button type="button" id="ex"><?php echo"<a href='eliminar_dd.php?id=".$fila['nombre_d']." '
                        onclick='return confirmar()' >ELIMINAR</a>"; ?></button>
                    </td>

                    
                    
                    
                    
                    <?php } ?>
                </tr>   
                 
             
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


