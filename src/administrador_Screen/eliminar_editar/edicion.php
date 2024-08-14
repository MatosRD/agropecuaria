<?php
if (isset($_POST['edid'])) {
    // Conectar a la base de datos
    $conn = mysqli_connect("localhost", "root", "", "login");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recoger y escapar los datos del formulario
    $id_inventario = $_GET['id']; // O donde tengas el ID del inventario a editar
    $codigo = $conn->real_escape_string($_POST['codigo']);
    $articulo = $conn->real_escape_string($_POST['articulo']);
    $cantidad = $conn->real_escape_string($_POST['cantidad']);
    $precio_c = $conn->real_escape_string($_POST['precio_c']);
    $precio_v = $conn->real_escape_string($_POST['Precio_v']);
    $ganancia = $conn->real_escape_string($_POST['ganancia']);

    // Verificar si se subió una nueva imagen
    if (!empty($_FILES['imagen']['tmp_name'])) {
        $imagen = $_FILES['imagen']['tmp_name'];
        $imagenContenido = addslashes(file_get_contents($imagen));

        // Actualizar con imagen
        $sql = "UPDATE inventario SET 
                    codigo = '$codigo', 
                    articulo = '$articulo', 
                    cantidad = '$cantidad', 
                    precio_costo = '$precio_c', 
                    precio_venta = '$precio_v', 
                    ganancia = '$ganancia',
                    imagen = '$imagenContenido'
                WHERE id_inventario = '$id_inventario'";
    } else {
        // Actualizar sin cambiar la imagen
        $sql = "UPDATE inventario SET 
                    codigo = '$codigo', 
                    articulo = '$articulo', 
                    cantidad = '$cantidad', 
                    precio_costo = '$precio_c', 
                    precio_venta = '$precio_v', 
                    ganancia = '$ganancia'
                WHERE id_inventario = '$id_inventario'";
    }

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo'<div style=" displey:flex;margin:10px; text-align: center; padding: 10px 10px;
        background: green;
        color: white;" >Editado Exitosamente</div>';
    } else {
        echo'<div style=" displey:flex;margin:10px; text-align: center; padding: 10px 10px;
  background: red;
  color: white;" >Error</div>';
    }

    // Cerrar la conexión
    $conn->close();
}
?>