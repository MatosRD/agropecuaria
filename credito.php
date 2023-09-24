<?php
session_start();
if(empty($_SESSION["id"])){
    header("location: login.php");
}

include 'conexion_2.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Credito</title>
</head>
<body style="background: #f5f5f5;" >
    

<div class="container">
<div class="nav">
    <div class="nav_sub" >

        <a href="cerrar.php" style="z-index: 100;" ><img src="salir.png" alt=""></a>
    </div>
</div>


    <div class="cabez1">
        <div class="ttd">
                <div class="imagen1">
                    <img src="logo.png" alt="logo">
                </div>
            <div class="text_1">
                 <h1 class="titulo" >--<?php echo $_SESSION["nombres"];?>--</h1> 
            </div>
        </div>
    </div>
<div class="correr" style="margin-top: -20px; margin-left:8

0px; ">
    <a href="vendedor.php">volver a Venta</a>
    
</div>

        <div class="center1">
        <h1>Credito Clientes</h1>
                    <form action="" method="post" >
                        <input type="text" name="busc" placeholder="codigo, producto" >
                        <button id = "buscar_c" class="YY"  >Buscar</button>
                        <a href="agregar_cliente.php" style="margin-left: 260px; padding: 10px 15px; background:green; color:white; border-radius:10px; text-decoration: none;" >AGREGAR CLIENTE ++</a>
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
                           
                        echo '<a href="credito.php"><button  style="display:flex; color: white; background: blue;
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

<div class="cotar">
    <h1>Abonar Deuda</h1>
    <?php  include'abonar.php' ?>
    <form action=""  method="post">
            <label for="">Nombre Cliente</label>
            <input type="text" name="nob" placeholder="Nombre, cliente" > <br>
            <label for="">Credito a Abonar </label>
            <input type="text" name="cred"  placeholder="Credito" >
            <button id="abonar" > Procesar </button>
    </form>
    </div>





<div class="busq">
<form action="" method="post" >
                        <input type="text" name="buc1" placeholder="Nombre Cliente " >
                        <button id = "buscar_c1" class="YY" >Buscar</button>
                    </form>
</div>

<table class="center2" >
    
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
                           
                        echo '<a href="credito.php"><button  style="display:flex; color: white; background: blue;
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

                



</body>
</html>