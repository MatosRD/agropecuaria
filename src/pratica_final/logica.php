<?php
session_start();
    include 'conexion.php';

    if(!empty(['OK'])){
        if(!empty($_POST['usuario']) and !empty($_POST['clave'])){
            $user = $_POST['usuario'];
            $clave = $_POST['clave'];
            $buscar_login = mysqli_query($conexion, "SELECT * FROM pratica WHERE usuario = '$user' and clave = '$clave'");
            $buscar = mysqli_query($conexion, "SELECT * FROM pratica WHERE usuario = '$user'");
          
            if($datos = $buscar_login-> fetch_object()){
                $_SESSION["id"] = $datos-> id;
                $_SESSION["nombres"] = $datos-> usuario;
                $_SESSION["roles"] = $datos-> rol;
                $_SESSION["estado"] = $datos-> estado;
                $_SESSION["intentos"] = $datos-> intentos;
          
                $id = $_SESSION["id"];
                $intento = $_SESSION["intentos"];
                $estado = $_SESSION["estado"];


                if( $_SESSION["roles"] == 'administrador' ){
                    header("location: inicio_adminitrador.php");
                    exit();
                }
                if($intento <= '6' AND $estado == 'activo'){    
                  if( $_SESSION["roles"] == 'usuario'){
                        header("location: incio_usuario.php");
                        
                    }
                }else{
                    
                    header("location: bloqueo.php");
                }
            }
            if($dato = $buscar-> fetch_object()){
                $_SESSION["id"] = $dato-> id;
                $_SESSION["intentos"] = $dato-> intentos;
                $_SESSION["nombres"] = $dato-> usuario;   
                $_SESSION["estado"] = $dato-> estado;

                $id =  $_SESSION["id"];
                $idd =  $_SESSION["nombres"];
                $intentos = $_SESSION["intentos"];
                $estado = $_SESSION["estado"];

                if($intentos <= '6' AND $estado =='activo'){
                    $intentos += 1;
                    $one = mysqli_query($conexion, "UPDATE pratica SET intentos = '$intentos' WHERE id = '$id'");
                    
                    echo "<div style='margin-top:-15px;margin-bottom:5px;margin-left:10px;'>Intento restantes ($intentos) / 7</div>";
                    
                }else{
                    mysqli_query($conexion, "UPDATE pratica SET estado = 'bloqueado' WHERE id = '$id'");
                    header("Location: bloqueo.php?id=$idd");
                }
            }        
        }
    }

?>
