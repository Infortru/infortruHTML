<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    <title></title>
</head>
<body>
<?php

require_once '../../conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $mensaje = $_POST['mensaje'];
    $fecha = date("d-m-Y H:i:s");
    $imagen = $_FILES['imagen']['name'];
    $publicar = $_POST['publicar'];

    // Validar y procesar la imagen
    if (!empty($imagen)) {
        $target_dir = "../../imagen/";
        $target_file = $target_dir . basename($imagen);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);
    } else {
        // Si no se subió una nueva imagen, mantener la imagen actual
        $sql = "SELECT imagen FROM articulos WHERE id = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $fila = mysqli_fetch_assoc($resultado);
        $imagen = $fila['imagen'];
    }

    // Actualizar la noticia
    $sql = "UPDATE articulos SET titulo = ?, mensaje = ?, fecha = ?, imagen = ?, publicar = ? WHERE id = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, 'sssssi', $titulo, $mensaje, $fecha, $imagen, $publicar, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<h3>Artículo actualizado correctamente.</h3>";
    } else {
        echo "Error al actualizar el artículo: " . mysqli_error($link);
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
<button class="btn btn-primary mt-3" onclick="window.location.href='../administrar.php'">Volver a Administrar</button>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-7+9j5e6b1z6+9j5e6b1z6+9j5e6b1z6+9j5e6b1z6+9j5e6b1z6+9j5e6b1z6+9j5e6b1z6+9j5e6b1z6+9j5e6b1z
" crossorigin="anonymous"></script>
</body>
</html>