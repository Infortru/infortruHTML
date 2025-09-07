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
    <title>Administrar</title>
</head>
<body>

    <h1 class="text-center mt-5">Administrar Noticias</h1>

<?php

    require_once '../../conexion.php';

    $sql = "SELECT * FROM noticias";
    $resultado = mysqli_query($link, $sql);
    if ($resultado) {
        echo "<table class='table table-striped'>";
        echo "<thead>
                <tr><th>ID</th><th>Título</th><th>Mensaje</th><th>Fecha</th><th>Imagen</th><th>Publicada</th><th>Acciones</th></tr>
            </thead>";
        echo "<tbody>";

        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['titulo'] . "</td>";
            echo "<td>" . $fila['mensaje'] . "</td>";
            echo "<td>" . $fila['fecha'] . "</td>";
            echo "<td>";
            if (!empty($fila['imagen'])) {
                echo "<img src='../../imagen/" . $fila['imagen'] . "' alt='Imagen' style='width: 100px; height: auto;'>";
            } else {
                echo "No hay imagen";
            }
            echo "</td>";
            echo "<td>" . ($fila['publicar'] ? 'Sí' : 'No') . "</td>";
            echo "<td>
                    <a href='../editar/editarNoticias.php?id=" . $fila['id'] . "' class='btn btn-warning'>Editar</a>
                    <a href='../eliminar/eliminarNoticias.php?id=" . $fila['id'] . "' class='btn btn-danger'>Eliminar</a>
                  </td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "Error al consultar la base de datos: " . mysqli_error($link);
    }
    ?>
    <button class="btn btn-primary mt-3" onclick="window.location.href='../administrar.php'">Volver a Administrar</button>
</body>
</html>