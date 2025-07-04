<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous">
        <title>Contacto</title>
    </head>
    <body>
        <?php
        include '../navegacion.html';
        require_once '../DB/conexion.php';
       
        $consulta="SELECT * FROM noticias";

        if($resultado=mysqli_query($link, $consulta)){

            while($registros=mysqli_fetch_assoc($resultado)){
                echo "<div class='card mt-5 rounded-2 shadow-sm' style='width: 60%; margin: auto;'>";
                echo "<div class='card-body'>";
                echo "<h2 class='card-title'>" . $registros["titulo"] . "</h2>";
                echo "<p class='card-text'>" . $registros["mensaje"] . "</p>";
                echo "<p class='card-text'><small class='text-muted'>Publicado el " . $registros["fecha"] . "</small></p>";
                echo "</div>";

                if($registros["imagen"]!=""){

                    echo "<img src='../DB/imagen/" . $registros["imagen"] . "'width= 350px' 'height=300px' />";
                }

                echo "<hr>";
                echo "</div>";

            }
        }

        include '../footer.html';
        ?>
    </body>
</html>