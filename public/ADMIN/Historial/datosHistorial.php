<?php
//Cabeceras
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    include_once '../conexion_admin.php';
    $sql = "SELECT * From consultas";
    $resultado = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    if (!$datos) {
        die('Solicitud Invalida' . mysqli_error($conexion));
    }

echo json_encode($datos);


$id = $_GET['id'];
$sqlcli = "SELECT * From usuariosclientes Where IdUsuario = $id";
$resultadocli = mysqli_query($conexion, $sqlcli);
$datoscli = mysqli_fetch_assoc($resultadocli);

if(!$resultadocli){
  echo 'Solicitud Invalida cliente';
}
echo json_encode($datoscli);


$sqlempl = "SELECT * From empleados Where IdEmpleados = $id";
$resultadoempl = mysqli_query($conexion, $sqlempl);
$datosempl = mysqli_fetch_assoc($resultadoempl);

if(!$resultadoempl){
  echo 'Solicitud Invalida empleados';
}
echo json_encode($datosempl);