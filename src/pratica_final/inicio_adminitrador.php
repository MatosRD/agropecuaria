<?php
session_start();
if(empty($_SESSION["id"]) or $_SESSION["roles"] == 'usuario' ){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<body>
<style>
        .center{
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }.center{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 800    ;
        }.center button{
            padding: 10px 30px;
            border-radius: 10px;
            background: rgb(91, 16, 156);
            color: white;
            border: none;
            cursor: pointer;
        }.center button a{
            color: white;
            text-decoration: none;
        }
    </style>
    <div class="center">
        <h1>Bienvenido Administrador</h1>
        <button><a href="destroyer.php">Salir</a></button>
    </div>
</body>
</html>