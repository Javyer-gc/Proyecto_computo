<?php

    include_once '../conexion_admin.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM empleados WHERE IdEmpleados = $id";
    $resultado = mysqli_query($conexion, $sql);
    
    if (!$resultado) {
        die('Consulta Fallida');
        header('location: ../AdministrarEmpleados.php');
    }else{
    echo "<script>
            alert('Empleado Eliminado Correctamente'); 
            window.location.href ='../AdministrarEmpleados.php'
            </script>";
    }

?>
