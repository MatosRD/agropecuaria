<?php 

include 'conexion.php';



session_start();
if(!empty(['buton'])){
    if(!empty($_POST['user']) and !empty($_POST['contraa'])){
        $usuarios_v = $_POST['user'];
        $contra_v = $_POST['contraa'];
        $buscar_user = mysqli_query($conexion,"SELECT * FROM usuarios_1 WHERE usuario = '$usuarios_v'");
        $buscar_clave = mysqli_query($conexion,"SELECT * FROM usuarios_1 WHERE contrasena = '$contra_v'");
        $buscar = mysqli_query($conexion,"SELECT * FROM usuarios_1 WHERE usuario = '$usuarios_v' and contrasena = '$contra_v'");
        if($datos = $buscar-> fetch_object()){
            $_SESSION["id"] = $datos-> id_usuarios;
            $_SESSION["nombres"] = $datos-> cargo;
            $_SESSION["roles"] = $datos-> rol;
            $ro = $_SESSION["roles"];
            if($ro == 1 ){
                header("location: administracion.php");
            }if($ro == 2){
                header("location: vendedor.php");
            }
            
        }if(mysqli_num_rows($buscar_user) == 0){
            echo '<div class = "past_1">usuario incorrecta</div>
            <style>#user{border-color:red;}</style>
            ';  
        }if(mysqli_num_rows($buscar_clave) == 0){
            echo '<div class = "past_1">contraseña incorrecta</div>
            <style>#clave{border-color:red;}</style>
            ';  
        }
    }

}else{
    echo '<div class = "past_1">Error</div>';
}


?>