<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Editar noticia en el sistema de administración">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Editar</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Editar Posts</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <img src="../../../imagenes/LogotipoInforTru.jpg" class="navbar-brand" >
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../administrar/administrarJardineria.php">Administrar Jardinería</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
<?php

    require_once '../../conexion.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $seccion = $_GET['seccion'];
        $sql = "SELECT * FROM jardineria WHERE id = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if ($fila = mysqli_fetch_assoc($resultado)) {
            // Mostrar el formulario de edición
            echo "<form action='../actualizar/actualizarJardineria.php' method='post' enctype='multipart/form-data' style='max-width: 600px; margin: auto;' class='mt-5'>";
            echo "<input type='hidden' name='id' value='" . $fila['id'] . "'>";
            echo "<div class='form-group'>";
            echo "<label for='titulo'>Título:</label>";
            echo "<input type='text' class='form-control' name='titulo' value='" . htmlspecialchars($fila['titulo']) . "' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='mensaje'>Mensaje:</label>";
            echo "<textarea class='form-control' name='mensaje' required>" . htmlspecialchars($fila['mensaje']) . "</textarea>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='imagen'>Imagen:</label>";
            if (!empty($fila['imagen'])) {
                echo "<img src='../../imagen/" . htmlspecialchars($fila['imagen']) . "' alt='Imagen actual' style='width: 100px; height: auto;'><br>";
                echo "Imagen actual: " . htmlspecialchars($fila['imagen']) . "<br>";
            }
            echo "<input type='file' class='form-control-file' name='imagen'>";
            echo "</div>";
            echo "<label for='publicar'>Publicar:</label>";
            echo "<input type='text' class='form-control' class='form-control' name='publicar' value='" . htmlspecialchars($fila['publicar']) . "' required>";
            echo "<button type='submit' class='btn btn-primary'>Actualizar</button>";
            echo "</form>";
        } else {
            echo "Jardinería no encontrada.";
        }
    } else {
        echo "ID no especificado.";
    }
?>
</body>
</html>