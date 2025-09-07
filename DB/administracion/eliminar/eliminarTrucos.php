<?php

    require_once '../../conexion.php';

    $id = $_GET['id'];
    $seccion = $_GET['seccion'];
    $sql = "DELETE FROM trucos WHERE id = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous">
    <button class="btn btn-primary mt-3" 
        onclick="window.location.href='../administrar/administrarTrucos.php'">
        Volver a Administrar Trucos
    </button>