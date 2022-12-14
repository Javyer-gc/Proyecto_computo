<?php

    include_once '../conexion_admin.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM usuariosclientes WHERE IdUsuario = $id";
    $resultado = mysqli_query($conexion, $sql);
    
    if (!$resultado) {
        die('Consulta Fallida');
        header('location: ../AdministrarUsuarios.php');
    }else{
    echo "<script>
            alert('Usuario Eliminado Correctamente'); 
            window.location.href ='../AdministrarUsuarios.php'
            </script>";
    }

?>
