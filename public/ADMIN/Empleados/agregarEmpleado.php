<?php
    include_once '../conexion_admin.php';
 
    $Nombre = $_POST['Nombre'];
    $Apellidos = $_POST['Apellidos'];
    $Puesto = $_POST['Puesto'];
    $Correo = $_POST['Correo'];

    
    if (verificarUserAndMail($Correo,$conexion) == 1) {
    echo "<script>
                alert('Ya existe el Usuario y/o Correo, por favor ingrese otro.'); 
                window.location.href ='../AdministrarEmpleados.php'
            </script>";
    }else{
            $sql = "INSERT INTO empleados(Nombre,Apellidos,Puesto,Correo) VALUES ('$Nombre','$Apellidos','$Puesto','$Correo')";
            $resultado = mysqli_query($conexion, $sql);
            if (!$resultado) {
                die('Consulta Fallida');
                header('location: ../AdministrarEmpleados.php');
            } else {
                echo "<script>
                        alert('Empleado Agregado Correctamente'); 
                        window.location.href ='../AdministrarEmpleados.php'
                    </script>";
            }
        }



    function verificarUserAndMail( $mail, $conexion)
    {
        $sql_mail = "SELECT * FROM empleados WHERE Correo = '$mail'";
        $resultado_mail = mysqli_query($conexion, $sql_mail);

        if ( mysqli_num_rows($resultado_mail) > 0) {
            return 1;
        } else {
            return 0;
        }
    }
?>
