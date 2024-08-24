<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>
    body {
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

p {
    text-align: center;
    margin-bottom: 20px;
    color: #666;
}

.input-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #333;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    color: #333;
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #218838;
}

.resend {
    text-align: center;
    margin-top: 20px;
    color: #666;
}

.resend a {
    color: #007bff;
    text-decoration: none;
}

.resend a:hover {
    text-decoration: underline;
}
</style>
<div class="container">
        <h2>Validación de Código</h2>
        <p>Ingrese el código de verificación enviado a su correo electrónico juan@gmail.com.</p>
        
        <form action="verificar_codigo.php" method="POST">
            <div class="input-group">
                <label for="codigo">Código de Verificación:</label>
                <input type="text" id="codigo" name="codigo" placeholder="Ingrese su código" required>
            </div>
            
            <button type="submit">Validar Código</button>
        </form>
        
        <p class="resend">
            ¿No recibió el código? <a href="#">Reenviar código</a>
        </p>
    </div>
</body>
</html>