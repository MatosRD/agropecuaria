
<?php
include './../conexion_DB/Conexion.php';

$id = $_GET['id'];
$clien = $_GET['client'];
$medidaTicket = 300;

$cliete = ("SELECT * FROM cliente WHERE nombre = '$clien'");
$full = mysqli_query($conexion, $cliete);

if(mysqli_num_rows($full) > 0){
    while($fila = mysqli_fetch_assoc($full)){
        $direccion = $fila['direccion'];
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>factura</title>
</head>

<body>
<style>
        * {
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
        }

        h1 {
            font-size: 18px;
        }

        .ticket {
            margin: 2px;
        }

        td,
        th,
        tr,
        table {
            
            border-collapse: collapse;
            margin: 0 auto;
        }

        td.precio {
            text-align: center;
            font-size: 11px;
        }

        td.cantidad {
            text-align: center;
            font-size: 12px;
        }

        td.producto {
            text-align: center;
            font-size: 11px;
        }
        td.sub {
            text-align: center;
        }

        th {
            text-align: center;
        }


        .centrado {
            text-align: center;
            align-content: center;
            
        }

        .ticket {
            width: <?php echo $medidaTicket ?>px;
            max-width: <?php echo $medidaTicket ?>px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        * {
            margin: 0;
            padding: 0;
        }

        .ticket {
            margin: 0;
            padding: 0;
        }

        body {
            text-align: center;
        }.descrip  {
            text-align: justify; 
        }.pp{
            font-size: 12px;
            text-align: justify; 
        }
    </style>

<div class="ticket centrado" style="margin-bottom: 10px;" >
        
        <h1 style="margin-top: 5px; ">F & F COMERCIAL</h1>
            <p style="font-size: 12px;" >Direccion: Residencial los Mangos<br> Azua RD, Calle Fabrico #4 </p>
            <p style="font-size: 12px;" >Tel: (829) 668-0987, (809) 477-5200</p>
            <p style="font-size: 12px; " >RNC 0000000</p>
            
            <div class="descrip" style="margin-left:20px;">
                <br>
            <p style="font-size: 13px;"> <?php  date_default_timezone_set('America/Santo_Domingo'); $hora = date('H:i:s'); $fecha =  date("d-m-Y");
            echo "<span style='margin-left:110px;'> $hora </span> <span style='margin-left:10px;'> $fecha </span> ";   ?></p>
            
            <p>Cliente: <?php echo $clien    ?></p>
            <div style="width:260px; height:auto;word-wrap:break-word; ">Direccion-Client: <?php  echo $direccion ?></div>
            <p>No: <?php echo $id ?></p>
           
            </div>
            <br>
            <h2>Factura</h2>
            <br>
            <?php
            # Recuerda que este arreglo puede venir de cualquier lugar; aquí lo defino manualmente para simplificar
            # Puedes obtenerlo de una base de datos, por ejemplo: https://parzibyte.me/blog/2019/07/17/php-bases-de-datos-ejemplos-tutoriales-conexion/
    
            ?>
    
            <table style="width:270px;">
                <thead>
    
                    <tr class="centrado" style="border-top: 1px solid black; border-bottom: 1px solid black;">
                             
                            <th>Cant</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Subtotal</ht>
                    </tr>
                </thead>
                <tbody>
                
                <?php
                    
                    $buscar = mysqli_query($conexion,"SELECT * FROM pedidos_c WHERE nopedido = '$id'");    
                    $total = 0 ;
                    while($filas = mysqli_fetch_assoc($buscar)){
                        $descrip = $filas['articulo'];
                        $canti = $filas['cantidad'];  
                        $pre = $filas['precio_venta'];
                        $sub = $filas['sub_total'];   
                        $des = $filas['descuento'];   
                      
                        $total += $sub;
                    
                    ?>
                        <tr >
                            <td class="precio"> <?php echo $canti ?></td>
                            <td class="cantidad" style=" max-width:50px;height:auto;word-wrap:break-word;"><?php echo $descrip ?></td>
                            <td class="producto"><?php  echo number_format($pre,2); ?></td>
                            <td class="precio"><?php  echo number_format($sub,2);  ?></td>
                            <br>
                        </tr>
                        <?php  }  ?>
                </tbody>
                <br>

                
                <tr style="border-top:1px solid black ;">        
                <td class="producto" colspan="2" >
                    <strong>TOTAL </strong>
                </td>
                <td>

                </td>
                <td class="precio" >
                <?php   echo  number_format( $total, 2); ?>
                </td>
            </tr>
            </table>
            <br>
            <br>
           <p style="margin-bottom: 10px;">Gracias por su Compra!!</p>
  
        </div>


</body>
</html>