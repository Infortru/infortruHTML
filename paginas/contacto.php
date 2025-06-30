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
        ?>
        <form action="contacto.php" method="post" class="card p-4 shadow-sm mb-5" style="width: 40%; margin: auto;">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="mail" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" id="mail" name="mail" required>
            </div>
            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje:</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            $usuario = $_POST['nombre'];
            $remitente = $_POST['mail'];
            $mensaje = $_POST['mensaje'];

            if($usuario && $remitente && $mensaje) {
                if (filter_var($remitente, FILTER_VALIDATE_EMAIL)) {
                    $cuerpo = "Nombre: " . $usuario . "\n";
                    $cuerpo .= "Correo: " . $remitente . "\n";
                    $cuerpo .= "Mensaje: " . $mensaje . "\n";
                    
                    $headers = "From: contacto@infortru.com" . "\r\n" .
                    'Reply-To:' . $remitente . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                    mail("contacto@infortru.com", "Formulario de contacto", $cuerpo, $headers);
                    echo "<div class='alert alert-success' role='alert'>Formulario enviado correctamente, gracias
                    por ponerte en contacto con nosotros, en breve contactaremos contigo.</div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Correo electrónico no válido.</div>";
                }
            } else {
                echo "<div class='alert alert-warning' role='alert'>Por favor, completa todos los campos.</div>";
            }
            include '../footer.html';
        ?>
    </body>
</html>