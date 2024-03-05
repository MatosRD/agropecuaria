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
    <title>Document</title>
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
        </ul>
        <a href="cerrar.php"><img src="salir.png" alt=""></a>
    </div>
</div>




<div class="auto">
<div class="auto1">
        <h1>Credito Clientes</h1>
                    <form action="" method="post" >
                        <input type="text" name="busc" placeholder="codigo, producto" >
                        <button id = "buscar_c" class="YY"  >Buscar</button>
                    </form>
                   
                
                
            
    
                <table style="width: 300px;">
                    <thead  >
                        <tr>
                            <th style="background: orange; color:black;">Codigo</th>
                            <th  style="background: orange; color:black; " >Descripcion</th> 
                            <th style="background: orange; color:black;" >Cantidad</th>
                            <th  style="background: orange; color:black; ">Itebis</th>
                            <th  style="background: orange; color:black; ">Precio de venta</th>
                            <th  style="background: orange; color:black; ">accion</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;" >
             
        
                    <?php 
                    include 'conexion_2.php';
                    include 'credito1.php';
            if(!empty("buscar_c")){ 
            if(!empty($_POST['busc'])){ 
                $bus = $_POST['busc'];
                $sentencia = "SELECT * FROM articulos_v1 WHERE descripcion like '%$bus%' or codigo = '$bus' ";
                    $total = mysqli_query($conexion, $sentencia);
                    if(mysqli_num_rows($total) > 0) {
                        echo '<style>.linea_1 .junt img{
                            display: none;
                            }
                            </style>';
                           
                        echo '<a href="fg.php"><button  style="display:flex; color: white; background: blue;
                        padding: 8px 15px; border:none; border-radius:10px;text-decoration: none;  margin-left: 5px; cursor: pointer; "> Limpiar pantalla</button></a>';
                        while($fila = mysqli_fetch_assoc($total)){
                            echo '<tr class="no2">';   
                           ?> <form action="" method="post" > <?php
                                $mx = $fila['codigo'];
                                echo '<td>';   ?> <input type="text"  name="mu" value="<?php  echo $mx;  ?>" style="border: none; background:#ddd; width:40px; ">  <?php         echo '</td>';
                                echo '<td>'; echo $fila['descripcion']; echo '</td>';
                               ?><td><input type="text" name="bu" value="1" style="width: 30px;" ></td>
                               <td> <label for="country">
                                <select id="country" name="country">
                                <option value="0">0.00</option>
                                <option value="54">18%</option>
                                </select></td><?php 
                                
            
                                echo '<td>'; echo $fila['precio_v']; echo '</td>';

                        echo '</tr>';
                        echo '<tfoot  style="text-align: center;" > ';
                            echo'<tr>';
                            echo'<td>';  echo'Nombre'; echo'</td>';
                            echo'<td>';  echo'<input  name="nombre" type="text" style="width:80px;"  placeholder=" Nombre" required>' ;      echo'</td>';
                            echo'<td>';  echo'Cedula'; echo'</td>';
                            echo'<td colspan="2" >';  echo'<input type="text" name="cedu"  placeholder=" Ingrese Cedula"   required>';      echo'</td>';
                            echo '<td>';  
                            echo'<button id="MMG" style="padding: 8px 15px; background: orange; color:black; border:none; border-radius:10px; borber:none; cursor:pointer; ">Facturar</button> '  ;  
                    echo '</td>';
                    ?> </form> <?php 
                            echo'</tr>';
                        echo'</tfoot >';


                        
                         }    
                         
                    }else{
                
        
                        echo '<div class="cliente" style="margin-left: 30px;">articulo no encotrado</div>';
                    }
                }
            }
            ?>   

                   

</div>

<div class="busq" style="margin-left: 190px; margin-top:200px; ">
<form action="" method="post" >
                        <input type="text" name="buc1" placeholder="Nombre Cliente " >
                        <button id = "buscar_c1" class="YY" >Buscar</button>
                    </form>
</div>

<table class="center2" style="margin-top: 200px;" >
    
                    <thead>

                    <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>cantidad</th>
                            <th>Precio</th>
                            <th>itbis 18%</th>
                            <th>Sub Total</th>
                            <th>Fecha abono</th>
                            <th>Abonacion</th>
                            <th>X pagar</th>

                        </tr>
                    </thead>
                    <tbody class="nn" >
                    <?php 
                include 'conexion_2.php';
                $total = 0;
                
                $mostrar_q = "SELECT * FROM deuda_1 ORDER BY id_deuda DESC ";
                $total_q = mysqli_query($conexion, $mostrar_q);
                $numero_aleatorio = rand(100000,10000000);
                ?>
                <?php  while($fila_q = mysqli_fetch_assoc($total_q)) { ?>
                    
                    <tr >
                    <td><?php echo $fila_q['nombre_d'] ?> </td>                             
                    <td><?php echo $fila_q['descripcion_d'] ?> </td>
                    <td><?php echo $fila_q['cantidad_d']   ?></td>
                    <td><?php echo $fila_q['precio_d'] ?>.00</td>
                    <td><?php echo $fila_q['itbis'] ?>.00 </td>
                    <td><?php echo $mtotal= $fila_q['sub_d'];
                    $total += $mtotal;?>.00 </td>
                    <td><?php echo $fila_q['fecha_a'] ?></td>
                    <td><?php echo $fila_q['abonacion'] ?></td>
                   
                    <?php } ?>
                    
                    
                </tr>
                    </tbody><a href="" target="_blank"></a>

                 <?php   if(!empty("buscar_c1")){ 
            if(!empty($_POST['buc1'])){ 
                $bus = $_POST['buc1'];
                $sentencia = "SELECT * FROM deuda_1 WHERE nombre_d like '%$bus%'";
                    $total = mysqli_query($conexion, $sentencia);
                    if(mysqli_num_rows($total) > 0) {
                        echo '<style>.center2 .nn{
                            display: none;
                            }
                            </style>';
                           
                        echo '<a href="fg.php"><button  style="display:flex; color: white; background: blue;
                        padding: 8px 15px; border:none; border-radius:10px;text-decoration: none;  margin-left: 5px; cursor: pointer; "> Limpiar pantalla</button></a>';
                        
                        $total1 = 0;
                        while($fila = mysqli_fetch_assoc($total)){
                            echo '<tr class="no2">';   
                           ?> <form action="" method="post" > <?php
                               
                                echo '<td>'; echo $fila['nombre_d']; echo'</td>';
                                echo '<td>'; echo $fila['descripcion_d']; echo '</td>';
                                echo '<td>'; echo $fila['cantidad_d']; echo '</td>';
                                echo '<td>'; echo $fila['precio_d']; echo '</td>';
                                echo '<td>'; echo $fila['itbis']; echo '</td>';
                                echo '<td>'; echo $ll = $fila['sub_d']; echo '</td>';
                                echo '<td>'; echo $fila['fecha']; echo '</td>';
                                echo '<td>'; echo $ab = $fila['abonacion']; echo '</td>';
                                echo '<td>'; echo $da = $fila['deuda']; echo '</td>';
                            $total1 += $ll;
                        }   
                        echo '</tr>';
                        echo '<tfoot  style="text-align: center; background:blue; height: 60px; " > ';
                            echo'<tr>';
                            echo '<td colspan="4" style="font-size: 24px; color:white; ">TOTAL</td>';
                            echo '<td style="color: yellow; font-size: 24px;" >RD</td>';
                            echo '<td style="color: yellow; font-size: 24px;" >'; echo $total1.'.00'; echo'</td>';
                            echo '<td " >'; echo'</td>';
                            echo '<td style="color: yellow; font-size: 24px;" >'; echo $ab.'.00'; echo'</td>';
                            echo '<td style="color: yellow; font-size: 24px;" >'; echo $da.'.00'; echo'</td>';
                            echo '<td style=" background:green; font-size: 24px;" ><a id="imprim" href="as2.php?val='.$bus.'&nun='.$numero_aleatorio.'"target="_blank" >Imprimir</a></td>';
                            echo'</tr>';
                        echo'</tfoot >';

                        
                       
                         
                    }else{
                
        
                        echo '<div class="cliente" style="margin-left: 30px;">articulo no encotrado</div>';
                    }
                }
            }
            ?>   
                </table>

</div>
    
</body>
</html>