<?php
include 'conexion_2.php';


if(!empty(["abonar"])){
    if(!empty($_POST['nob']) and !empty($_POST['cred'])  ){
            $nombr = $_POST['nob'];
            $credit = $_POST['cred'];
            $fech = date("d/m/y");
            $busca = mysqli_query($conexion,"SELECT * FROM deuda_1 WHERE nombre_d = '$nombr'");

            $tota = 0;
            
            while($fila_q = mysqli_fetch_assoc($busca)){
                $abon = $fila_q['abonacion']; 
                $ca = $fila_q['sub_d'];
                $tota += $ca; 
            }

            if(mysqli_num_rows($busca) > 0)
            {
                $t = $abon + $credit ;
                $ga = $tota - $t;
                if($t <= $tota){
                    $acta = mysqli_query($conexion,"UPDATE deuda_1 SET abonacion = '$t', fecha_a = '$fech', deuda = '$ga'   WHERE nombre_d = '$nombr' ");
                    echo '<div id="green"> Abonacion agregada</div>';
                    echo '<a href="credito.php" style="display: flex;  justify-content: center; color:blue; " >Volver </a>';
                    exit;
                }else{
                    echo'<div style=" text-align:center; color:white; background:red; padding: 10px 15px; ">Pasa Pago De Deuda</div>';
                }
        }else{
            echo '<div style=" text-align:center; color:white; background:red; padding: 10px 15px; "> Cliente No Registrado</div>';
        }
    }
 }


?>