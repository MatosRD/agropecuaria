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
    <title>Datos</title>
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


<div class="cuatro">
    <div class="cuatro1">
        <h1>#. articulos:</h1>
        <?php 
        include 'conexion_2.php';

        $nart = mysqli_query($conexion,"SELECT * FROM articulos_v1");
         $contar = mysqli_num_rows($nart);
         echo' <div class="zz" >'.$contar.'</div> ';
        ?>
    </div>







    <div class="cuatro1">
        <h1>Factura Vendidos:</h1>
        <?php 
        $total = 0 ; 
        $nart = mysqli_query($conexion,"SELECT * FROM facturacion_venta_1");
        while($fila = mysqli_fetch_assoc($nart)){
            $sun = $fila['cantidad_f'];
            $total += $sun;
        }
        echo' <div class="zz"> ' . $total. '</div> ';
        ?>
    </div>
    <div class="cuatro1" style="background: orange;" >
        <h1 style="color: white;" >Ganancia factura:</h1>
        <?php
        $total = 0 ; 
        $nart = mysqli_query($conexion,"SELECT * FROM facturacion_venta_1");
        while($fila = mysqli_fetch_assoc($nart)){
            $sun = $fila['sub'];
            $total += $sun;
        }
      
        echo'<h1 style="color:white; "  >$ ';  echo  number_format( $total, 2);  echo'</h1>' ;
        ?>
    </div>
        <div class="cuatro1" style="background: green; color:white;">    
        <h1>Cuenta pagada</h1>
        <?php  

include 'conexion_2.php';

$todo = mysqli_query($conexion,"SELECT * FROM deuda_1");


    $mostrar_a = "SELECT  distinct abonacion FROM deuda_1  ";    
    $total = mysqli_query($conexion, $mostrar_a);

    $tt = 0;
    while($filas = mysqli_fetch_assoc($total)) {  

        
         $nb = $filas['abonacion']; 
        $tt += $nb;
    } 


  
        echo'<h1 style="text-align:center;" >$ '    .number_format( $tt, 2). '</h1>' ;    
     
 
?>
        </div>


    <div class="cuatro1" style="background: red; color:white; " >
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

echo'<h1>$ ';  echo  number_format( $rel, 2);  echo'</h1>' ;
 
?>
</div>

</div>





<div class="fechi">
    <div class="fechi_1">


    <form action="" method="post" >
        <div class="fechi2">
            <h4>Fecha inicial</h4>
        <input type="text" name="dad" placeholder="dd/mm/yyyy" ></input>
        </div>
        <div class="fechi2">
            <h4>Fecha final</h4>
        <input type="text" name="mom" placeholder="dd/mm/yyyy" ></input>
       
    </div>
    <button id="BUBU" >Buscar</button>
        </form>   

    </div>
</div>
<div class="fac_2" style="margin-bottom: 20px;" >
                <table class="um" >
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Descripcion</ht>
                            <th>Cantidad</ht>
                            <th>Fecha</th>
                            <th>precio</th>
                            <th>subtotal</th>                         
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                include 'conexion_2.php';
                
                if(!empty(['BUBU'])){
                    if(!empty($_POST['dad'])  ){ 
                        $fecha_1 = $_POST['dad'];
                        $fecha_2 = $_POST['mom'];
                        

                        $tre = mysqli_query($conexion, "SELECT * FROM facturacion_venta_1 WHERE fecha  BETWEEN '$fecha_1' AND '$fecha_2'    ");
                        $shi = 0;
                ?>
                <?php  while($fila = mysqli_fetch_assoc($tre)) { ?>

                    <tr class="no1">
                    <td><?php echo $fila['codigo'] ?> </td>
                    <td><?php echo $fila['descripcion_f'] ?> </td>
                    <td><?php echo $fila['cantidad_f'] ?> </td>
                    <td><?php echo $fila['fecha'] ?> </td>
                    <td><?php echo $fila['precio_f'] ?> </td>
                    <td><?php echo $preci = $fila['sub'] ?> </td>

                    <?php   $shi += $preci ; ?>

                    </tr>    
                <?php } ?>                         
                    </tbody>
                    <tfoot style=" height:60px ;   text-align: center;
   font-size: 24px;" >
                        <tr>
                            <td colspan="4" style="background: blue; color:white;">TOTAL</td>
                            <td  style="background: blue; color:white;">RD</td>
                            <td style="background: green; color:white; " > <?php echo  number_format( $shi, 2);   ?></td>
                        </tr>
                    </tfoot>
                    
                </table>
 </div>
 </div>        
                    <div class="esp">    
                <button class="expol" id="exportar" > <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6haxy9msNwQTYsXA0smDuQcZianV3ukVaIQ&usqp=CAU" alt="" style="width: 40px;" ><?php echo"<a href='exportal.php?fechao=".$fecha_1."&fechat=".$fecha_2."'>Exportar Exel</a>"; ?> </button>
                   <button class="pdf"><img src="https://cdn4.iconfinder.com/data/icons/logos-and-brands/512/27_Pdf_File_Type_Adobe_logo_logos-512.png" alt="" style="width: 30px;" > <?php echo"<a href='pdf.php?fechao=".$fecha_1."&fechat=".$fecha_2." ' target='_blank'>Exportar PDF</a>"; ?>  </button> 
                   </div> 
<?php                 }else{
                    
                } } ?>

                
<script>
        document.getElementById("icono_menu").addEventListener("click", menu_menu);
        function menu_menu(){
            document.querySelector(".nav_sub").classList.toggle("menu_menu")
        }

    </script>

            </body>
</html>