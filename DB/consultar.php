<?php
//require_once '../secciones/noticias.php';
require_once '../DB/conexion.php';

if($resultado=mysqli_query($link, $consulta)){
           
            echo "<div class='d-flex flex-wrap justify-content-center'>";
            while($registros=mysqli_fetch_assoc($resultado)){
                if($registros["publicar"] == 1){
                    echo "<div class='card w-35 shadow-sm rounded-3'>";
                    echo "<div class='card-body'>";
                    echo "<h2 class='card-title text-center'>" . $registros["titulo"] . "</h2>";
                    if($registros["imagen"] != ""){
                        echo "<img src='../DB/imagen/" . $registros["imagen"] . "' class='card-img-top' alt='Imagen de la noticia' width='350px' height='300px'>";
                    } else {
                        echo "<img src='../imagenes/LogotipoInforTru.jpg' class='card-img-top' alt='Imagen por defecto' width='350px' height='300px'>";
                    }
                    echo "<p class='card-text'>" . $registros["mensaje"] . "</p>";
                    echo "<p class='card-text'><small class='text-muted'>Publicado por " . $registros["nombre"] . " el " . $registros["fecha"] . "</small></p>";
                    echo "</div>";
                    echo "</div>";
                }   
            }
        }
        echo "</div>";