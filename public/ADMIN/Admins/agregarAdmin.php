<?php
    include_once '../conexion_admin.php';

    $Usuario = $_POST['Usuario'];
    $Correo = $_POST['Correo'];
    $Contrasena = $_POST['Contrasena'];
    
    if (verificarUserAndMail($Usuario,$Correo,$conexion) == 1) {
    echo "<script>
                alert('Ya existe el Usuario y/o Correo, por favor ingrese otro.'); 
                window.location.href ='../AdministrarAdmins.php'
            </script>";
    }else{
        if (strlen($Contrasena) < 6) {
        echo "<script>
                alert('La contraseña debe ser mayor a 5 caracteres'); 
                window.location.href ='../AdministrarAdmins.php'
            </script>";
        }
        else{
            $Contrasena = password_hash($Contrasena, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuariosadmin(adminuser,correo,contrasena) VALUES ('$Usuario','$Correo','$Contrasena')";
            $resultado = mysqli_query($conexion, $sql);
            if (!$resultado) {
                die('Consulta Fallida');
                header('location: ../AdministrarAdmins.php');
            } else {
                echo "<script>
                        alert('Usuario Agregado Correctamente'); 
                        window.location.href ='../AdministrarAdmins.php'
                    </script>";
            }
        }
    }

    
    function verificarUserAndMail($user, $mail, $conexion)
    {
        $sql_user = "SELECT * FROM usuariosadmin WHERE adminuser = '$user'";
        $resultado_user = mysqli_query($conexion, $sql_user);

        $sql_mail = "SELECT * FROM usuariosadmin WHERE correo = '$mail'";
        $resultado_mail = mysqli_query($conexion, $sql_mail);

        if (mysqli_num_rows($resultado_user) > 0 || mysqli_num_rows($resultado_mail) > 0) {
            return 1;
        } else {
            return 0;
        }
    }
?>
