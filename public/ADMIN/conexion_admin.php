<?php
    $link = 'localhost';
    $usuario='root';
    $pass='root';
    $DB='ehelp';

    $conexion = mysqli_connect($link,$usuario,$pass,$DB);

    if($conexion){
        //echo 'Conectado';
    }
    else{
      //  echo 'Conexión Fallida';
    }

    