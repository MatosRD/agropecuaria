<?php 

include 'conexion_2.php';

if(!empty(["abonar"])){
    if(!empty($_POST['nob']) and !empty($_POST['cred'])  ){
            $nombre = $_POST['nob'];
            $credito = $_POST['cred'];
            $fecha = date("d/m/y");
            $buscar = mysqli_query($conexion,"SELECT * FROM deuda_1 WHERE nombre_d = '$nombre'");

            $total = 0;
            
            while($fila_q = mysqli_fetch_assoc($buscar)){
                $abono = $fila_q['abonacion']; 
                
                $cal = $fila_q['sub_d'];
                
                $total += $cal; 
            }

            if(mysqli_num_rows($buscar) > 0)
            {
                $tt = $abono + $credito ;
                $gas = $total - $tt;
                if($tt <= $total){
                    $actal = mysqli_query($conexion,"UPDATE deuda_1 SET abonacion = '$tt', fecha_a = '$fecha', deuda = '$gas'   WHERE nombre_d = '$nombre' ");
                    echo '<div id="green"> Abonacion agregada</div>';
                    header("location: credito.php");
                }else{
                    echo'credito pasado';
                }
            
            }
    }

}if(!empty(["www"])){
    if(!empty($_POST['nom_c']) and !empty($_POST['cre_c'])  ){
            $nombr = $_POST['nom_c'];
            $credit = $_POST['cre_c'];
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
                    header("location: deuda1.php");
                }else{
                    echo'credito pasado';
                }
        }
    }
 }



?>