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
    <title>Perfil</title>
    <script> function confirmar(){
    return confirm('¿Estas seguro de eliminar los datos?');
    }</script>
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
            <li><a href="cerrar.php"><img src="salir.png" alt="" id="fifa" style="width: 35px;"></a></li>
        </ul>
       
    </div>
</div>
<a href="cerrar.php"><img src="salir.png" alt="" id="RR" style="width: 35px;" ></a>
        
        <div class="menu">
                <img src="menu.png" id="icono_menu">
            </div>

<div class="cabez">
        <div class="imagen">
            <img src="logo.png" alt="logo">
        </div>
        <div class="text1"> <h1>PERFIL</h1></div>
    


<div class="pld" >

<div class="agre" style="margin-top: 0px;  margin-bottom:40px; ">
        <form action="" method="post">
            <div class="agre_2" style="background:#dddddd;">
                <h1>Agregar Usuario</h1>
                <?php
                    include 'agres.php';
                ?>
                <label for="codigo" >Usuario:</label>
                <input  id="cd" class="ipp" type="text" name="usuario">
                <label for="descripcion" >contraseña:</label>
                <input  id="dc" type="text" name="clave" >
                <label for="cantidad" >Cargo:</label>
                <input  id="ct"  type="text" name="cargo">


                <button  id="agre" >Agregar</button>
            </div>
            </form>
        </div>
<div class="prm">
<table   > 
    <thead>
        <tr>

            <th>USUARIOS</th>
            <th>CARGO</th>
            <th>CONTRASEÑA</th>
            <th>ACCION</th>
        </tr>
    </thead>
    <tbody>
        <?php 
                include 'conexion_2.php';
                $ejet = mysqli_query($conexion,"SELECT * FROM usuarios_1");
            while($filas = mysqli_fetch_assoc($ejet)){ 
            
            ?>
             <tr>
            <td><?php echo $us = $filas['usuario'];  ?></td>
            <td><?php echo $us = $filas['cargo'];  ?></td>   
            <td><?php echo $us = $filas['contrasena'];  ?></td>
            <td>
            <button type="button" id="ea"><?php echo"<a href='editaruser.php?id=".$filas['id_usuarios']." '
            >Editar</a>"; ?></button>            
            <br>
            <button type="button" id="ex"><?php echo"<a href='eliminarpin.php?id=".$filas['id_usuarios']." '
            onclick='return confirmar()' >ELIMINAR</a>"; ?></button>
            </td>
            </tr>   
            <?php  } ?>
       
    </tbody>
</table>
</div>
</div>
<script>
        document.getElementById("icono_menu").addEventListener("click", menu_menu);
        function menu_menu(){
            document.querySelector(".nav_sub").classList.toggle("menu_menu")
        }

    </script>
</body>
</html>