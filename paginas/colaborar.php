<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">
    <title>InforTru</title>
</head>
<body>
    <?php
        include '../navegacion.html';
    ?>
    <form action="colaborar.php" method="post" class="card p-4 shadow-sm mb-5" style="width: 40%; margin: auto;">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">Correo electrónico:</label>
            <input type="email" class="form-control" id="mail" name="mail" required>
        </div>
        <select class="form-select mb-3" id="colaboracion" name="colaboracion" required>
            <option value="" disabled selected>Elije la sección donde te gustaría colaborar</option>
            <option value="noticias">Noticias</option>
            <option value="articulos">Escribir un artículo</option>
            <option value="recetas">Compartir una receta</option>
            <option value="trucos">Trucos para el hogar</option>
            <option value="jardineria">Contar como cuidas tu plantas</option>
            <option value="bricolage">Compartir una manualidad</option>
        </select>
            
        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje:</label>
            <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
        $usuario = $_POST['nombre'];
        $remitente = $_POST['mail'];
        $colaboracion = $_POST['colaboracion'];
        $mensaje = $_POST['mensaje'];
    
    include '../footer.html';       
?>
        
    
</body>
</html>