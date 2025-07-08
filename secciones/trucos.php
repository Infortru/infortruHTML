<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous">
        <title>Trucos</title>
    </head>
    <body>
        <?php
        include '../navegacion.html';
        
        require_once '../DB/conexion.php';

        echo "<h1 class='text-center my-4'>Trucos del hogar</h1>";

        $consulta="SELECT * FROM trucos";

        include '../DB/consultar.php';

        include '../footer.html';
        ?>
    </body>
</html>