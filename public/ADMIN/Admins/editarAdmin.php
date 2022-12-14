<?php

    include_once '../conexion_admin.php';

    $id = $_POST['Id'];
    $Usuario = $_POST['Usuario'];
    $Correo = $_POST['Correo'];
    $Contrasena = $_POST['Contrasena'];

    

    if($Contrasena != ''){
        if (verificarUserAndMail($id,$Usuario, $Correo, $conexion) == 1) {
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
            }else{
                $Contrasena = password_hash($Contrasena, PASSWORD_DEFAULT);

                $sql = "UPDATE usuariosadmin SET adminuser = '$Usuario', correo = '$Correo', contrasena = '$Contrasena' WHERE Id = '$id'";
                $resultado = mysqli_query($conexion, $sql);
                if (!$resultado) {
                    die('Consulta Fallida');
                } else {
                    echo "<script>
                    alert('Administrador Actualizado Correctamente'); 
                    window.location.href ='../AdministrarAdmins.php'
                    </script>";
                }
            }
        }
        
    }else{
        if (verificarUserAndMail($id,$Usuario, $Correo, $conexion) == 1) {
            echo "<script>
                        alert('Ya existe el Usuario y/o Correo, por favor ingrese otro.'); 
                        window.location.href ='../AdministrarAdmins.php'
                    </script>";
        } else {
        $sql = "UPDATE usuariosadmin SET adminuser = '$Usuario', correo = '$Correo' WHERE Id = '$id'";
            $resultado = mysqli_query($conexion, $sql);
            if (!$resultado) {
                die('Consulta Fallida');
            } else {
                echo "<script>
                    alert('Administrador Actualizado Correctamente'); 
                    window.location.href ='../AdministrarAdmins.php'
                    </script>";
            }
        }
    }


    function verificarUserAndMail($id,$user, $mail, $conexion)
    {

        $sql_user = "SELECT * FROM usuariosadmin WHERE adminuser = '$user' AND Id != $id";
        $resultado_user = mysqli_query($conexion, $sql_user);

        $sql_mail = "SELECT * FROM usuariosadmin WHERE  correo = '$mail' AND Id != $id";
        $resultado_mail = mysqli_query($conexion, $sql_mail);

        if (mysqli_num_rows($resultado_user) > 0 || mysqli_num_rows($resultado_mail) > 0) {
            return 1;
        } else {
            return 0;
        }
    }
