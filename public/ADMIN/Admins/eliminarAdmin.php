<?php

    include_once '../conexion_admin.php';

    $id = $_GET['id'];
    if($id==1){
    echo "<script>
            alert('No se puede eliminar al admin ROOT'); 
            window.location.href ='../AdministrarAdmins.php'
            </script>";
    }else{
        $sql = "DELETE FROM usuariosadmin WHERE Id = $id";
        $resultado = mysqli_query($conexion, $sql);

        if (!$resultado) {
        echo "<script>
                alert('consulta Fallida'); 
                window.location.href ='../AdministrarAdmins.php'
            </script>";
        } else {
            echo "<script>
                alert('Administrador Eliminado Correctamente'); 
                window.location.href ='../AdministrarAdmins.php'
                </script>";
        }
    }
   

?>