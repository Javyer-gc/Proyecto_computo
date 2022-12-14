<?php
  //Cabeceras
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');

    include_once '../conexion_admin.php';
    $sql = "SELECT * From usuariosadmin";
    $resultado = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    if(!$datos){
      die('Solicitud Invalida' . mysqli_error($conexion));
    }

  echo json_encode($datos);