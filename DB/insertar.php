<?php
header('Location: https://infortru.com/paginas/colaborar.php');
    require_once 'conexion.php';

     if($_FILES["imagen"]["error"]){

            switch ($_FILES["imagen"]["error"]){

                case 1: //Excede el tamaño permitido por php.ini
                    echo "El archivo excede el tamaño permitido por el servidor.";
                break;

                case 2: //Excede el tamaño fijado en el formulari0 (2MB)
                    echo "El archivo excede de 2MB.";
                break;

                case 3: // El archivo no se subió correctamente
                    echo "El archivo no ha subido correctamente.";
                break;

                case 4: //No se sube ningún archivo
                    echo "No has seleccionado ningún archivo.";
                break;
            }
        }else{

            echo "Subida exitosa: ";

            if((isset($_FILES["imagen"]["name"]) && ($_FILES["imagen"]["error"]==UPLOAD_ERR_OK))){

                $destino_ruta="imagen/";  //Si no hay error las imágenes se guardan en esta carpeta

                move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino_ruta . $_FILES["imagen"]["name"]);

                echo "El archivo " . $_FILES["imagen"]["name"] . " se ha guardado en la carpeta correspondiente. <br>";

            }else{

                echo "El archivo no se ha podido guardar en el directorio de imágenes.";
            };
        };
    
    $usuario = $_POST['nombre'];
    $remitente = $_POST['mail'];
    $titulo = $_POST['titulo'];
    $colaboracion = $_POST['colaboracion'];
    $mensaje = $_POST['mensaje'];
    $imagen = $_FILES['imagen']['name'];
    $fecha = date("d-m-Y H:i:s");
    $publicar=0;

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO $colaboracion (nombre, email, titulo, fecha, mensaje, imagen, publicar) VALUES ('$usuario', '$remitente', '$titulo', '$fecha', '$mensaje', '$imagen', '$publicar')";
    exec($sql);
    // Verificar si la consulta se ejecutó correctamente
    if (mysqli_query($link, $sql)) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar los datos: " . mysqli_error($link);
    }
   
    