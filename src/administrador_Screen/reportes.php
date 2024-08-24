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
    <title>Reporte</title>
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
                <li> <a href="salida_dia.php"><img src="./../img/grafico.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Salida</span></a></li>
                <li> <a href="consulta.php"><img src="./../img/vendedor.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Actividad</span></a></li>
                <li> <a href="usuario.php"><img src="./../img/perfil-del-usuario.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Usuarios</span></a></li>
                <li> <a href="cerrar.php"><img src="./../img/salir.png" alt="" style="width: 35px;"><span style="padding-left: 10px; position: relative; bottom: 10px ;">Salir</span></a></li>
            </ul>
        </nav>
    </header>


<div class="centrl">
    <h1>Reporte</h1>
</div>


    <div class="fechi">
        <div class="fechi_1">
            <form action="" method="post" >
                <div class="fechi2">
                    <h4>Fecha inicial</h4>
                        <input type="text" name="dad" placeholder="año/mes/dia" ></input>
                </div>

                <div class="fechi2">
                    <h4>Fecha final</h4>
                        <input type="text" name="mom" placeholder="año/mes/dia" ></input>
                </div>

                <div class="fechi3">
                    <label for="country"></label>
                    <select id="country" name="country">
                        <option value="">vendedor</option>
                        <?php
                            $consulta = mysqli_query($conexion, "SELECT DISTINCT vendedor FROM pedidos_c");
                            while($fila = mysqli_fetch_assoc($consulta)){
                                $vendedor = $fila['vendedor']; 
                                // Assuming there's an ID or another identifier for the option value
                                $id = $fila['id_pedidos']; // Replace 'id' with the actual column name if different
                                echo '<option value="'.$vendedor.'">'.$vendedor.'</option>';
                            }
                        ?>
                    </select>
                </div>


                <button id="BUBU" >Buscar</button>
                
            </form>   
        </div>
    </div>


    

    <div class="fac_2" style="margin-bottom: 0px;" >
        <table class="um" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th style="background:#6836ff;">Producto</th>
                    <th style="background:#6836ff;">vendedor</th>
                    <th style="background:#6836ff;">Cantidad</th>
                    <th style="background:#6836ff;">Fecha</th>
                    <th style="background:#6836ff;">Precio</th>
                    <th style="background:#6836ff;">Subtotal</th>                       
                </tr>
            </thead>
            <tbody>
            <?php 
                
                if(!empty(['BUBU'])) {
                    if(!empty($_POST['dad']) ) {
                        $fecha_1 = $_POST['dad'];
                        $fecha_2 = $_POST['mom'];
                        $selec = $_POST['country'];
                      
                        if($selec == ""){
                            $tre = mysqli_query($conexion, "SELECT * FROM pedidos_c WHERE fecha BETWEEN  '$fecha_1' AND  '$fecha_2'");
                            $shi = 0;
                            $ga = 0;
                            
                        }else{
                            $tre = mysqli_query($conexion, "SELECT * FROM pedidos_c WHERE fecha BETWEEN  '$fecha_1' AND  '$fecha_2' AND vendedor = '$selec'");
                            $shi = 0;
                            $ga = 0;
                        }         
            ?>
            <?php  while($fila = mysqli_fetch_assoc($tre)) { ?>
                <tr class="no1">
                    <td><?php echo $fila['articulo'] ?> </td>
                    <td><?php echo $fila['vendedor'] ?> </td>
                    <td><?php echo $fila['cantidad'] ?> </td>
                    <td><?php echo $fila['fecha'] ?> </td>
                    <td><?php echo $fila['precio_venta'] ?> </td>
                    <td><?php echo $preci = $fila['sub_total'] ?> </td>
                    <?php  $ganancia = $fila['ganancia'] ?> 

                    <?php   $shi += $preci ;    
                            $ga += $ganancia;
                    
                    ?>
                </tr>    
                <?php } ?>                         
                </tbody>
                <tfoot style="height:60px;text-align: center;font-size: 18px;">
                <tr>
                    <td colspan="4" style="background: blue; color:white;">GANANCIA</td>
                    <td  style="background: blue; color:white;">RD</td>
                    <td style="background: green; color:white; " > <?php echo $ga  ?></td>
                </tr>
                </tfoot>

                <tfoot style="height:60px;text-align: center;font-size: 18px;">
                <tr>
                    <td colspan="4" style="background: blue; color:white;">TOTAL</td>
                    <td  style="background: blue; color:white;">RD</td>
                    <td style="background: green; color:white; " > <?php echo $shi  ?></td>
                </tr>
                </tfoot>
               
                </table>
 </div>
            <?php }}  ?>
            <?php  
                if(!empty(['BUBU'])) {
                    if(!empty($_POST['dad']) ) {
                        ?>
                        <div class="esp" style="margin-top: 20px;">    
                            <button class="expol" id="exportar" ><?php echo"<a href='./excel_Screen/excel_rep.php?fechai=".$fecha_1."&fechat=".$fecha_2."&vend=".$selec."'>Excel</a>"; ?> </button>
                        </div>
                        <?php
                    }
                }
            
            
            ?>
</body>
</html>