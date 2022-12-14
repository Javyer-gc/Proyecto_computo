<?php
    include_once '../conexion_admin.php';

    $Usuario = $_POST['Usuario'];
    $Nombre = $_POST['Nombre'];
    $Apellidos = $_POST['Apellidos'];
    $Correo = $_POST['Correo'];
    $Contrasena = $_POST['Contrasena'];

   
    
    if (verificarUserAndMail($Usuario,$Correo,$conexion) == 1) {
    echo "<script>
                alert('Ya existe el Usuario y/o Correo, por favor ingrese otro.'); 
                window.location.href ='../AdministrarUsuarios.php'
            </script>";
    }else{
        if (strlen($Contrasena) < 6) {
            echo "<script>
                    alert('La contraseña debe ser mayor a 5 caracteres'); 
                    window.location.href ='../AdministrarUsuarios.php'
                </script>";
        }else{
            $Contrasena = md5($Contrasena);
            $sql = "INSERT INTO usuariosclientes(Usuario,Nombre,Apellidos,Correo,Contrasena) VALUES ('$Usuario','$Nombre','$Apellidos','$Correo','$Contrasena')";
            $resultado = mysqli_query($conexion, $sql);
            if (!$resultado) {
                die('Consulta Fallida');
                header('location: ../AdministrarUsuarios.php');
            } else {
                echo "<script>
                        alert('Usuario Agregado Correctamente'); 
                        window.location.href ='../AdministrarUsuarios.php'
                    </script>";
            }
        }
        
    }

    
    function verificarUserAndMail($user, $mail, $conexion)
    {
        $sql_user = "SELECT * FROM usuariosclientes WHERE Usuario = '$user'";
        $resultado_user = mysqli_query($conexion, $sql_user);

        $sql_mail = "SELECT * FROM usuariosclientes WHERE Correo = '$mail'";
        $resultado_mail = mysqli_query($conexion, $sql_mail);

        if (mysqli_num_rows($resultado_user) > 0 || mysqli_num_rows($resultado_mail) > 0) {
            return 1;
        } else {
            return 0;
        }
    }
?>
