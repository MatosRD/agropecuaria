<?php
include 'conexion_2.php';

if(isset($_POST["edid"])){
    
        
   
        $canew = $_POST['cantidad'];
        
        
  
        

        $ss = mysqli_query($conexion,"SELECT * FROM deuda_1 WHERE id_deuda = '$id'");

        while($fila = mysqli_fetch_assoc($ss)){
            $n = $fila['nombre_d'];
            $c = $fila['cantidad_d'];
            $p = $fila['precio_d'];
            $i = $fila['itbis'];
            $a = $fila['abonacion'];
            $des = $fila['descripcion_d'];
            
        }
            
            $tt = $p * $canew + $i;
           
          
        $SQLL = "UPDATE deuda_1 SET  cantidad_d = '$canew', sub_d = '$tt' WHERE id_deuda = '$id'";    
        $tll = mysqli_query($conexion, $SQLL);
        $pp = mysqli_query($conexion,"SELECT * FROM deuda_1 WHERE nombre_d = '$n'");

        $df = 0;
        while($fila = mysqli_fetch_assoc($pp)){
            $s = $fila['sub_d'];
            $df += $s;
        }

        $ff = $df - $a;

        $gj = mysqli_query($conexion,"UPDATE deuda_1 SET deuda = '$ff' WHERE nombre_d = '$n' ");

            $st = mysqli_query($conexion,"SELECT * FROM articulos_v1 WHERE descripcion = '$des'");
            while($filaf = mysqli_fetch_assoc($st)){
            
            $ca = $filaf['cantidad'];
            }
          


        if($canew > $c){
            $kk = $canew - $c;
            $sun = $ca - $kk ;
            $rr = mysqli_query($conexion, "UPDATE articulos_v1 SET cantidad ='$sun' WHERE descripcion = '$des' ");
        }else{ 
            $kk = $c - $canew;
            $sun = $ca + $kk ;
            $rr = mysqli_query($conexion, "UPDATE articulos_v1 SET cantidad ='$sun' WHERE descripcion = '$des' ");
        }
        





        $cct = $canew;
       
        echo' <div class="EDID" >Editado Exitosamente </div>  ';
    }

      



?>