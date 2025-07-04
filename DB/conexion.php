<?php

    $host_name = 'db5018130907.hosting-data.io';
    $database = 'dbs14387885';
    $user_name = 'dbu1119025';
    $password = 'LaNucia03530';

    $link = new mysqli($host_name, $user_name, $password, $database);

    if ($link->connect_error) {
        die('<p>Error al conectar con servidor MySQL: '. $link->connect_error .'</p>');
    }