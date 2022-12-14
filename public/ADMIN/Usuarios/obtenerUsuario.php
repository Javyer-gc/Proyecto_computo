<?php
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');

  include_once '../conexion_admin.php';
  $id = $_GET['id'];
  $sql = "SELECT * From usuariosclientes Where IdUsuario = $id";
  $resultado = mysqli_query($conexion, $sql);
  $datos = mysqli_fetch_assoc($resultado);

  if(!$resultado){
    echo 'Solicitud Invalida';
  }
  echo json_encode($datos);
?>
